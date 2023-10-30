<?php

namespace App\Policies;

use App\Models\Cup;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CupPolicy
{

    
    /**  Determines whether a user can borrow a cup**/
    
    public function borrow(User $user,Cup $cup) {
        
        return true;
        
    }
}
