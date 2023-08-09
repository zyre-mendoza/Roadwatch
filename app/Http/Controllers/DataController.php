<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Data;
class DataController extends Controller
{
    //
    function show(){
        
        $users = DB::table('davao del norte')->get();
        return view('list.show', ['davao del norte' => $users]);
        //return view('list')
    }
}
