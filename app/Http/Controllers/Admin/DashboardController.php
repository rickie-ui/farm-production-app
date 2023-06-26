<?php

namespace App\Http\Controllers\Admin;

use App\Models\Produce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
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

        $farmers = DB::table('farmers')
            ->where('deleted_at', NULL)
            ->latest()
            ->get();       
        ;


        return view('dashboard', ['farmers' => $farmers]);
    }
}
