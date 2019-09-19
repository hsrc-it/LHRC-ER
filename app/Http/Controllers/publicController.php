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

class publicController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
      $totalEducationalResources = EducationalResource::count();
      $EducationalResources = EducationalResource::paginate(10);
      if($request->ajax())
        {
            return  View::make('results', compact('EducationalResources',['data' => $EducationalResources]));
        }
      return  response(View::make('search', compact('totalEducationalResources', 'EducationalResources')))->header('X-Frame-Options', 'allow-from http://staging-lh-hsrc.pnu.edu.sa:8080');
  }

  public function search(Request $request)
  {
      $findEducationalResources = new EducationalResource();
      $findEducationalResources = $findEducationalResources->newQuery();
      if($request->keyword != '')
      {
        $findEducationalResources->where(function ($query) use ($request){
          $query->where('title', 'LIKE', "%{$request->keyword}%")
                ->orwhere('keywords', 'LIKE', "%{$request->keyword}%");
        });
      }
      if($request->gender != '')
      {
        $findEducationalResources->where('gender', $request->gender);
      }
      if($request->age_group != '')
      {
        $findEducationalResources->where('age_group', $request->age_group);
      }
      if($request->language != '')
      {
        $findEducationalResources->where('language', $request->language);
      }
      if($request->topic != '')
      {
        $findEducationalResources->with('topics')->whereHas('topics', function($query) use ($request){
                $query->where('topic_id', $request->topic);
            });
      }
      $findEducationalResources->orderBy('date_of_approval', 'asc');
      $findEducationalResources = $findEducationalResources->paginate(10);
      return  response(View::make('results', compact('findEducationalResources',['data' => $findEducationalResources])))->header('X-Frame-Options', 'allow-from http://staging-lh-hsrc.pnu.edu.sa:8080');
  }
}
