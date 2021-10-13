<?php

namespace App\Http\Controllers;

use App\Models\Contactus as ModelsContactus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Contactus extends Controller
{
    public function index(){
        if(Auth::user()->role==config("constants.SUPER_ADMIN_ROLE") || Auth::user()->role==config("constants.PRINCIPAL_ROLE")){
            // return view()
        }else{
            redirect('login');
        }
    }
    public function insert(Request $request){        
        $result = [
            "status"=>false,
            "message"=>"OOps something went wrong"
        ];
        
        if($request->input()){
            $name = $request->input('name');
            $email = $request->input('email');
            $message = $request->input('message');
            if($name!="" && $email!="" && $message!=""){
                $insertData = [
                    "name"=>$name,
                    "email"=>$email,
                    "message"=>$message
                ];            
                if(ModelsContactus::insert($insertData)){
                    $result['status'] = true;
                    $result['message'] = "Thank you for response,it really matters for us";
                }
            }
        }
        
        return json_encode($result);
    }
}
