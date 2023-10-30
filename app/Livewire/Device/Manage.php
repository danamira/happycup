<?php

namespace App\Livewire\Device;

use App\Models\Device;
use Livewire\Component;

class Manage extends Component
{
    
    
    public $counter=0;

    public Device $device;

    public function mount(Device $device) {
        $this->device = $device;
        $this->counter = $device->cup_count;
    }
    
    public function toggleStatus() {
        $this->device->active = !$this->device->active;
        $this->device->update();
    }
    
    public function updated() {

        $this->validate([
            'counter'=>'integer|required|min:0|max:'.$this->device->capacity
        ]);
        
    }
    
    public function updateCounter() {
    
        $this->validate([
            'counter'=>'integer|required|min:0|max:'.$this->device->capacity
        ]);
        $this->device->cup_count=$this->counter;    
        $this->device->update();
    }
    
    
    
    public function incrementCounter($by) {
        $this->counter+=$by;
    }    
    public function render()
    {
        return view('livewire.device.manage')->extends('layouts.app',['tab'=>'machines'])->section('content');
    }
}
