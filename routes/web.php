<?php

use App\Http\Controllers\CupController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;


Route::get('/',\App\Livewire\Device\Index::class)->name('home');
Route::get('/device/{device}/manage',App\Livewire\Device\Manage::class)->name('device.manage');
Route::get('topup/{user}/',App\Livewire\Topup::class)->name('topup');

Route::get('/scan',[CupController::class,'scan'])->name('scan');

Route::get('/cup/store',[CupController::class,'store']);
Route::get('/test',function() {
    return 'nanat';
});

Route::get('/nfc',function() {
    return view('nfc');
});