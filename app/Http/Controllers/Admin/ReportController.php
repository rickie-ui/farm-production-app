<?php

namespace App\Http\Controllers\Admin;

use App\Models\Farmer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ReportController extends Controller
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
        //Getting farmers table only
         $clients = DB::table('farmers')
            ->where('deleted_at', NULL)
            ->latest()
            ->get();         
        ;

        
        //getting farmers table and their coffee production
      $farmers = DB::table('farmers')
            ->leftJoin('produces', 'farmers.id', '=', 'produces.farmer_id')
            ->latest('farmers.created_at')  
            ->where('produces.deleted_at', NULL)
            ->where('produces.quantity', '>', 0)     
            ->get();
        ;

         $farmerCount = Farmer::count();
         $sum = $farmers->sum('quantity');


        return view('users.report', ['farmers' => $farmers,'farmerCount' => $farmerCount, 'sum'=> $sum, 'clients' => $clients]);
    }
    
}
