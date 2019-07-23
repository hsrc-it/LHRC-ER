<?php

namespace App\Http\Controllers;

use App\EducationalResource;
use App\Source;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Support\Facades\DB;

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
      if (Auth::check())
      {
          $validatedData = $request->validate([
              'title' => ['required','max:500','regex:/[^\s]/','unique:educational_resources,title'],
              'topics' => ['required'],
              'gender' => ['required','integer'],
              'age_group' => ['required','integer'],
              'language' => ['required','integer'],
              'date_of_approval' => ['required'],
              'url' => ['required','url','unique:educational_resources,url'],
              'format' => 'required',
              'sources' => 'required'
          ]);
          $transaction = DB::transaction(function() use ($request, & $newResource){
              $newResource = new EducationalResource;
              $newResource->user_id = Auth::User()->id;
              $newResource->created_at = date("Y-m-d H:i:s");
              $newResource->fill($request->all());
              $newResource->save();


              $newResource->save();
              if( !$newResource )
              {
                  //throw new \Exception('sorry Resource could not be uploaded, try again');
                  session(['error' => "sorry Resource could not be uploaded, try again"]);
              }
              else {
                //add Topics
                $newResource->topics()->sync($request->topics);
                //add sources
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
                session(['success' => "Resource were added successfuly"]);
              }
          });
          //submit success message to user
          return View::make('admin.create');
    }
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
