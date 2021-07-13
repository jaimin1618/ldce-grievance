<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class My_controller extends Controller
{
    public function __construct() {
        
    }
    public function user(){
        return Auth::user();
    }
}
