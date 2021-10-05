<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\InvoicePaid;

class NotificationController extends Controller
{

    public function notify()
    {
        $user = User::first();
        $user->notify(new InvoicePaid($user));
    }

}
