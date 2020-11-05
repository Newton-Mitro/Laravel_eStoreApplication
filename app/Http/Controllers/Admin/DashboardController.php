<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function home()
    {
        return view('backend.home');
    }

    public function posts()
    {
        return view('backend.post');
    }
}
