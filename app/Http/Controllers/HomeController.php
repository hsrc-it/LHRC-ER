<?php

namespace App\Http\Controllers;

use App\EducationalResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $allResources = EducationalResource::get();
        //return view('home', compact('allResources'));
        return response(View::make('home',compact('allResources')))->header('X-Frame-Options', 'DENY');
    }
}
