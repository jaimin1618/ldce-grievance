<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \App\Models\Department;
use Illuminate\Support\Facades\Validator;

class Profile extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function index(){
        $data = [];
        $user = Auth::user();
        $data['name'] = $user->name;
        $data['email'] = $user->email;
        $data['contact'] = $user->contact;
        $data['enrollment'] = $user->enrollment;        
        if(isset($user->department) && $user->department!=""){
            $data['department'] = Department::where("department_id","$user->department")->first()->department_name;
        }
        // print_r(Department::where("department_id",$user->department)->get()->toArray());
        // die;
        
        return view('pages.profile')->with($data);
    }

    function saveData(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'contact' => 'required'
        ]);
        if($validator->fails()){
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        $user = Auth::user();
        $user->name = $request->get('name');
        $user->contact = $request->get('contact');
        $user->save();
        return back();
    }
}
