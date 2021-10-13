<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactMessage extends Controller
{
    public function index () {
        return view('pages.contactmsg');
    }
    
    public function show () {
        $messages = DB::table('contactus')->get();
        return json_encode($messages);
    }
    
}
