<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\shop;
use App\User;
use Illuminate\Http\UploadedFile;
use Helpers;


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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listshops = shop::all()->sortBy('distance');

        return view('home',['shops'=>$listshops]);
    }

    
}
