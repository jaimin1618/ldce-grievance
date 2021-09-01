<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Department extends Controller
{
    function index(){
        return view('pages.department');
    }
}
