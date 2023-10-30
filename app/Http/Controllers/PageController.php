<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home() {
        
        $devices = Device::all();
        return view('home')->with(['devices'=>$devices]);
        
    }
    
}
