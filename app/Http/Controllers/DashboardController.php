<?php

namespace App\Http\Controllers;

use App\category;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function __construct()
    {
        //
    }

    public function index()
    {
        $categories = category::with('news')->get();

        return view('home', compact('categories'));
    }

}
