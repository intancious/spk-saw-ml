<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // echo "Halaman Admin";
        // echo "<h1>" . Auth::user()->name . "</h1>";
        // echo "<a href=/logout> Logout >></a>";
        return view('Admin.pages.home');
    }
    public function user()
    {
        // echo "Halaman Calon Mitra";
        // echo "<h1>" . Auth::user()->name . "</h1>";
        // echo "<a href=/logout>Logout >></a>";
        return view('Admin.pages.home');
    }
}
