<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ContactMessage extends Controller
{    
    public function index(){
        if(Auth::user()->role==config("constants.SUPER_ADMIN_ROLE") || Auth::user()->role==config("constants.PRINCIPAL_ROLE")){
            return view('pages.contactmsg');
        }
        return view('pages.dashboard');
    }

    public function show () {
        $messages = DB::table('contactus')->get();
        return json_encode($messages);
    }
    
}
