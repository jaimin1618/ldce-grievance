<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ManageUser extends Controller
{
    function index(){
        if(Auth::user()->role==config("constants.SUPER_ADMIN_ROLE") || Auth::user()->role==config("constants.PRINCIPAL_ROLE")){
            $passData = [];
            $passData['departments'] = Department::select("*")->get()->toArray(); 
            return view('pages.manage_users',$passData);
        }
        return view('pages.dashboard');
    }
    
    function show () {
        $data = [];
        $data = DB::select("SELECT id,name,email,role FROM users WHERE role != '4' ORDER BY role");
        return json_encode($data);
    }
    
    function show_user ($id) {
        $data = [];
        $data = DB::table('users')->where('id', $id)->first();
        return json_encode($data);
    }
    
    function delete ($id) {
        $status = 1;
        $is_deleted = DB::table('users')->where('id', '=', $id)->delete();
        // $is_deleted = true;
        if (!$is_deleted) {
            $status = 0;
        }
        $data = ['status' => $status];
        return json_encode($data);
    }
    
    function edit (Request $req) {
        $validate = $req->validate([
            'name' => 'required|max:80',
            'email' => 'required|max:80|email',
            'contact' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'role' => 'required|between:0,6',
            'instituteNum' => 'required|integer|between:1,100',
            'departmentNum' => 'integer|between:0,100',
            'password' => 'required|min:8'
        ]);
        
        $status = 1;
        
        $update = [
            'name' => $req->name,
            'email' => $req->email,
            'contact' => $req->contact,
            'role' => $req->role,
            'department' => $req->deptNum,
            'institute' => $req->instituteNum,
            'password' => Hash::make($req->password)
        ];
        
        $is_updated = DB::table('users')->where('id', $req->id)->update($update);
        if (!$is_updated) {
            $status = 0;
        }
        $data = ['status' => $status];
        return json_encode($data);
    }

    function addUser (Request $req) {
        $status = 1;

        $validate = $req->validate([
            'name' => 'required|max:80',
            'email' => 'required|max:80|email',
            'contact' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'role' => 'required|between:0,6',
            'instituteNum' => 'required|integer|between:1,100',
            'departmentNum' => 'integer|between:0,100',
            'password' => 'required|min:8'
        ]);

        $check = DB::table("users")
        ->where("email", "=", $req->email)
        ->orWhere("name", "=", $req->name)
        ->first();

        $add = [
            'name' => $req->name,
            'email' => $req->email,
            'contact' => $req->contact,
            'role' => $req->role,
            'department' => $req->deptNum,
            'institute' => $req->instituteNum,
            'password' => Hash::make($req->password)
        ];

        if ($check == null) {
            $is_inserted = DB::table('users')->insert($add);
            if ($is_inserted == true) {
                $status_code = 1;
            }
        } 
        if ($check != null) {
            $status_code = 2; // FOR EXIST USER
        }
        
        return json_encode(['status' => $status_code]);
    }
    
    
}