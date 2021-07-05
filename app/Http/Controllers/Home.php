<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Home extends My_controller
{
    public function index()
    {
              
        return view("pages.home");
    }
}
