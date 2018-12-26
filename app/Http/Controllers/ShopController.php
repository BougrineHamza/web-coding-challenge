<?php

namespace App\Http\Controllers;

use App\shop;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ShopController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listshops = shop::all()->sortBy('distance');
        
        if(Auth::user()->is_admin)
        {
            return view('shop.index',['shops'=>$listshops]);
        }
        else 
        {
            return redirect()->intended('/home');
            
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->is_admin)
        {
            return view('shop.newshop');
        }
        else 
        {
            return redirect()->intended('/home');
        }   
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $shop = new shop();
        $shop->name = $request->input('name');  
        $shop->distance = $request->input('distance');  
        
        if ($request->hasFile('photo'))
        {
            $shop->photo  = $request->photo->store('image');
            
        }
        $shop->save();

        return redirect('shop');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function show(shop $shop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function edit(shop $shop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, shop $shop)
    {
        $shop = shop::find($shop->id);
        if ($shop->liked == 0) 
        {
            
            $shop->liked = 1;
            session()->flash('success','Shop Added To Prefered Shop');
        }
        else {
            $shop->liked=0;
            session()->flash('success','Shop Removed From Prefered Shop');
        }
        $shop->save();
        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shop = shop::find($id);
        $shop->delete();
       
        session()->flash('success','Shop Removed with success');
        return back();
    }

    public function preferedshop()
    {
        if(Auth::user()->is_admin)
        {
            $listshops = shop::all()->sortBy('distance');
            return view('shop.preferedshop',['shops'=>$listshops]);
        }
        else 
        {
            return redirect()->intended('/home');
        }   
        
        
       
    }

   

   
}
