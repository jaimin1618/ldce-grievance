<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $data['department'] = $user->department;
        $data['institute'] = $user->institute;
        return view('pages.profile')->with($data);
    }

    function saveData(Request $request){
        $validator = \Validator::make($request->all(),[
            'email' => 'required',
            'contact' => 'required'
        ]);
        if($validator->fails()){
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        $user = Auth::user();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->contact = $request->get('contact');
        $user->enrollment = $request->get('enrollment');
        $user->department = $request->get('department');
        $user->institute = $request->get('institute');
        $user->save();
        return back();
    }
}
