<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Topup extends Component
{
    public User $user;
    public bool $done=false;
    public $topupValue=0;



    public function mount(User $user) {

        $this->user=$user;
        
    }
    
    
    
    public function increment() {

        if($this->topupValue<=0) {
            return;
        }
        $this->user->credit+=$this->topupValue;
        $this->user->update();
        $this->done=true;
    }
    
    public function render()
    {
        return view('livewire.topup')->extends('layouts.app',['tab'=>''])->section('content');
    }
}
