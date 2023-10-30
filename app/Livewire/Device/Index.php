<?php

namespace App\Livewire\Device;

use App\Models\Cup;
use App\Models\Device;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Index extends Component
{
    public $devices;
    public function mount() {
        $this->devices = Device::all();
    }
    
    public function render()
    {
        $totalCups=Cup::count();
        $borrowedCups = DB::table('users')->sum('borrowed');

        $emptyDevices = Device::where('cup_count',0)->count();
        
        return view('livewire.device.index')->with(['stats'=>['totalCups'=>$totalCups,'borrowedCups'=>$borrowedCups,'emptyDevices'=>$emptyDevices]])->extends('layouts.app',['tab'=>'machines'])->section('content');
    }
}
