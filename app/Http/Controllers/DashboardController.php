<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function getdashboard()
    {
        if(session()->has('fullname'))
            return view('dashboard');
        else
            return redirect('/login');
    }
}
