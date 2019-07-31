<?php

namespace App\Http\Controllers;

use App\EducationalResource;
use App\Author;
use URL;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class EducationalResourcesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View::make('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response(View::make('admin.create'))->header('X-Frame-Options', 'DENY');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // Forget multiple keys...
      $request->session()->forget(['error', 'success']);

      if (Auth::check())
      {
          $validatedData = $request->validate([
              'title' => ['required','max:500','regex:/[^\s]/','unique:educational_resources,title'],
              'topics' => ['required'],
              'gender' => ['required','integer'],
              'age_group' => ['required','integer'],
              'language' => ['required','integer'],
              'date_of_approval' => ['required'],
              'url' => ['nullable','url','unique:educational_resources,url'],
              'file' => ['file','max:3000', 'required_if:url,""'],
              'format' => 'required',
              'authors' => ['required']
          ]);


          try{
            //save file metadata
            $transaction = DB::transaction(function() use ($request){
              $newResource = new EducationalResource;
              $newResource->user_id = Auth::User()->id;
              $newResource->fill($request->all());

              if(!empty($request->file))
              {

                $title = (string) Str::uuid();
                $fileExtension = $request->file->getClientOriginalExtension();
                $fileName = $title.'.'.$fileExtension;
                $path = $request->file->storeAs('public/educational_resources', $fileName);
                //check if file uploaded successfully
                if(!empty($path) ){
                  //get url of uploaded fileName
                  $newResource->url = asset('storage/educational_resources/'.$fileName);
                  $newResource->save();
                }else{
                  // submit error message to user
                  throw new \Exception('Resource could not be uploaded');
                }
              }else{
                $newResource->save();
              }
              if( $newResource )
              {
                //add Topics
                $newResource->topics()->sync($request->topics);
                if(!empty($request->authors))
                {
                  // add sources
                  $authors = json_decode($request->authors);
                  foreach($authors as $author)
                  {
                    $newAuthor = new Author;
                    $newAuthor->educational_resource_id	 = $newResource->id;
                    if ($author === reset($authors)){
                      if($author->name == "" || $author->email == "" || $author->phone == ""){
                        throw new \Exception('First author must have full information(name, email and phone)');
                      }
                      else{
                        $newAuthor->name = $author->name;
                        $newAuthor->email = $author->email;
                        $newAuthor->phone = $author->phone;
                        $newAuthor->save();
                      }
                    }
                    else{
                        if($author->name == ""){
                          if(!empty($path)){
                            Storage::delete($path);
                          }
                          throw new \Exception('Authors name is mandotry');
                        }else{
                          $newAuthor->name = $author->name;
                          $newAuthor->email = $author->email;
                          if($author->phone == ""){
                            $newAuthor->phone = null;
                          }else{
                            $newAuthor->phone = $author->phone;
                          }
                          $newAuthor->save();
                        }
                    }
                  }
                  session(['success' => "Resource with id $newResource->id were added successfuly"]);
                }else{
                  if(!empty($path)){
                    Storage::delete($path);
                  }
                  throw new \Exception('At least one author must be added');
                  }
              }else{
                if(!empty($path)){
                  Storage::delete($path);
                }
                throw new \Exception('Resource could not be uploaded');
              }
            });
          }
          catch(\Exception $e){
            session(['error' => $e->getMessage()]);
          }
      }
      return response(redirect()->route('createResource'))->header('X-Frame-Options', 'DENY');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->header('X-Frame-Options', 'DENY');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return response()->header('X-Frame-Options', 'DENY');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return response()->header('X-Frame-Options', 'DENY');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return response()->header('X-Frame-Options', 'DENY');
    }
}
