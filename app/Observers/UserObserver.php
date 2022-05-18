<?php

namespace App\Observers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Mail;

class UserObserver
{

    public function creating(User $user)
    {
        $user->password = request('password') ?? 'secret';
    }

    public function created(User $user)
    {
        $user->sendEmailVerificationNotification();
    }

    public function updated(User $user)
    {
    }

    public function deleted(User $user)
    {
    }
}
