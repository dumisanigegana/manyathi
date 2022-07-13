<?php

namespace App\Http\Controllers;

use App\Models\User;  
// use App\Models\Subscriber;  
use Auth;

class DashboardController
{
    public function index()
    {
        $subscriber = Auth::user()->subscriber;
        return view('profile', ['subscriber' => $subscriber]);
    }
}
