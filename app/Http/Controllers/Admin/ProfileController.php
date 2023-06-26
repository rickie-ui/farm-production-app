<?php

namespace App\Http\Controllers\Admin;

use App\Models\Farmer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
      $this->middleware(['auth']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    { 
        $farmer = Farmer::get();

        $result= $farmer->find($id);

          return view('users.profile', ['result'=> $result]);
    }

     /**
     * update a  stored resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {

         $result = Farmer::get();
         $farmer= $result->find($id);
         $farmer->fullName = $request->input('fullName');
         $farmer->phone = $request->input('phone');
         $farmer->location = $request->input('location');
         $farmer->account = $request->input('account');
         $farmer->coffee = $request->input('coffee');

         $farmer->update();

        return redirect()->back()->with('success', 'Information updated successfully!');
    }


      //delete the farmer
    public function destroy($id)
    {
      $farmer = Farmer::where('id', $id)->get()->first();
      
      $farmer->delete();
      
      $farmer->produces()->delete();

      return redirect()->route('report');
    }

 

 }
