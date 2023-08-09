<?php

namespace App\Http\Controllers;
use App\Pangasinan;
use Illuminate\Http\Request;

class PangasinanController extends Controller
{
    public function show(){
        $data = Pangasinan::all();
        return view('list', ['pangasinan'=>$data]); 
    }
}
