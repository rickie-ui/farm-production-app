<?php

namespace App\Http\Controllers\Admin;

use App\Models\Farmer;
use App\Models\Produce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Symfony\Component\Console\Input\Input;

class ProduceController extends Controller
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
        return view('users.produce');
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Farmer $farmer)
    {

          $formFields = $request->validate([
                'account' => 'required',
                'quantity' => 'required|integer'
              ]);
                         
              if (Farmer::where('account', '=', $request->input('account'))->first() === null) {
                      return back()->with('status', 'Invalid account number');
               }else{

                   $farmers = DB::table('farmers')
                   ->where('farmers.account', '=' ,$request->input('account'))
                    ->get();
                    ;

                  foreach ($farmers as $farmer) {
                    if($farmer){ 
                    $formFields['farmer_id'] = $farmer->id;
                     Produce::create($formFields);
                        return redirect()->back()->with('success', 'Farmer\'s produce added successfully!');
                      }
                             
                    }  
               
               }

           }   
           
    }

    
