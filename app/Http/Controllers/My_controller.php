<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Boolean;

class My_controller extends Controller
{
    public function __construct() {
        
    }
    protected function user(){
        return Auth::user();
    }
    protected function return_message($status=false,$message="OOPS! something went wrong!!"){
        return json_encode([
            "status"=>$status,
            "message"=>$message
        ]);
    }
}
