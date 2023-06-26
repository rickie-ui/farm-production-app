<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Farmer;
use Illuminate\Http\Request;

class FarmerController extends Controller
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
    public function index()
    {
        return view('users.manage');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    

        $formFields = $request->validate([
                'fullName' => 'required|max:255',
                'phone' => 'required|string',
                'location' => 'required|max:255',
                'coffee' => 'required',
              ]);

            $digits = 6;
            $result = rand(pow(10, $digits-1), pow(10, $digits)-1);

            $formFields['account'] = $result;

              Farmer::create($formFields);

            return redirect()->back()->with('success', 'Farmer\'s account created successfully!');

    }

   
}
