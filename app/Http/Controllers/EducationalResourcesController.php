<?php

namespace App\Http\Controllers;

use App\EducationalResource;
use App\Source;
use URL;
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
        return View::make('admin.create');
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
              'sources.*.name' => ['required', 'integer']
          ]);

          //save file metadata
          $transaction = DB::transaction(function() use ($request){
            $newResource = new EducationalResource;
            $newResource->user_id = Auth::User()->id;
            $newResource->fill($request->all());

            if(!empty($request->file))
            {
              $path = $request->file->storeAs('public/educational_resources', $request->title.'.'.$request->file->getClientOriginalExtension());
              //check if file uploaded successfully
              if(! empty($path) ){
                //get url of uploaded fileName
                $newResource->url = asset('storage/educational_resources/'.$request->title.'.'.$request->file->getClientOriginalExtension());
                $newResource->save();
              }else{
                // submit error message to user
                session(['error' => "sorry file could not be uploaded, try again"]);

                throw new \Exception('Resource could not be uploaded');
              }
            }else{
              $newResource->save();
            }
            if( $newResource )
            {
              //add Topics
              $newResource->topics()->sync($request->topics);
              if(!empty($request->sources))
              {
                // add sources
                $sources = json_decode($request->sources);
                foreach($sources as $source)
                {
                    $newSource = new Source;
                    $newSource->educational_resource_id	 = $newResource->id;
                    $newSource->source_name = $source->name;
                    $newSource->source_email = $source->email;
                    $newSource->source_phone = $source->phone;
                    $newSource->save();
                }
                session(['success' => "Resource with id $newResource->id were added successfuly"]);
              }else{
                  Storage::delete($path);
                  session(['error' => "At least one sources must be added"]);
                  throw new \Exception('At least one sources must be added');
                }
            }else{
              Storage::delete($path);
              session(['error' => "Sorry Resource could not be uploaded, try again"]);
              throw new \Exception('Resource could not be uploaded');
            }
        });
      }
      return redirect()->route('admin.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
