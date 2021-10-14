<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class Department extends Controller {
    
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function index(){
        if(Auth::user()->role==config("constants.SUPER_ADMIN_ROLE") || Auth::user()->role==config("constants.PRINCIPAL_ROLE")){
            return view('pages.department');
        }
        return view('pages.dashboard');
    }
    
    public function show ($id = 0) {
        if ($id == 0) {
            $arr['data'] = DB::select("SELECT * FROM departments ORDER BY department_id");
        } else {
            $arr['data'] = DB::table('departments')->where('department_id', $id)->first();
        }
        echo json_encode($arr);
        exit;
    }
    
    public function store (request $req) {
        // ADD NEW DEPT if NO ERROR
        /*
            returning
            status_code => 0 => Other Error
            status_code => 1 => Success
            status_code => 2 => Already Exits
        */
        $status_code = 0;
        $id = $req->id;
        $name = $req->name;

        // OR where([[], []]) => TO MATCH BOTH CONDITIONS
        $check = DB::table("departments")
                ->where("department_id", "=", $id)
                ->orWhere("department_name", "=", $name)
                ->first();
                    
        if ($check == null) {
            $is_inserted = DB::table('departments')->insert([
                'department_name' => $name,
                'department_id' => $id
            ]);
            if ($is_inserted == true) {
                $status_code = 1;
            }
            return Array('status' => $status_code);
        }
        if ($check != null) {
            $status_code = 2; // FOR EXIST DEPT
            return Array('status' => $status_code);
        }
    }
    
    public function delete (request $req) {
        $id = $req->id;
        $status = 1;
        $is_deleted = DB::table('departments')->where('department_id', '=', $id)->delete();
        if ($is_deleted) {
            $status = 1;
        } else {
            $status = 0;
        }
        
        return ['status' => $status, 'id' => $id];
                
    }
    
    public function update (request $req) {
        $status = 0;
        
        $id = $req->id;
        $deptId = $req->deptId;
        $name = $req->name;
        
        $is_updated = DB::table('departments')->where('id', $id)->update(['department_id' => $deptId, 'department_name' => $name]);
        if ($is_updated) {
            $status = 1;
        }
                
        return ['status' => $status];
    }
}
