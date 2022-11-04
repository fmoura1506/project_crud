<?php

namespace App\Policies;

use App\Models\Login;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class LoginPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function verAdm (Login $user, Login $login)
    {
        return $user->email == 'admin@admin.com';

    }
}
