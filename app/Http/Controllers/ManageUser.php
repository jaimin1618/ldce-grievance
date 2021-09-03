<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManageUser extends Controller
{
    function index(){
        return view('pages.manage_users');
    }
}