<?php

namespace App\Http\Controllers;

use App\Empolyee;
use Illuminate\Http\Request;
use DB;
use Validator;

class EmpolyeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emps=Empolyee::all();
        
        return view('home',compact('emps'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $loc=$request->location;
        return view('layouts.create',compact('loc'));
    
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $imageName="";
        if(($request)->hasFile('image')){
        $imageName=$request->image->store('public');
    }

        $emp=new Empolyee();
       
        $emp->first_name = $request->fname;
        $emp->last_name = $request->lname;
        $emp->image=$imageName;       
        $emp->job_title = $request->job_title;
        $emp->location= $request->location;
        //dd($request->location);
        $emp->status = $request->status;
        $emp->uId = 1;
       

        $emp->save();
      
        $emps=Empolyee::all();
   
        return view('home',compact('emps'));
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empolyee  $empolyee
     * @return \Illuminate\Http\Response
     */
    public function show(Empolyee $empolyee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empolyee  $empolyee
     * @return \Illuminate\Http\Response
     */
    public function edit(Empolyee $empolyee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empolyee  $empolyee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empolyee $empolyee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empolyee  $empolyee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empolyee $emp)
    {
        $emp->delete();
       
        $emps=Empolyee::all();
         
         return view('home',compact('emps'));
 
    }
}
