<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class ManageUser extends Controller
{    
    public function __construct()
    {
        $this->middleware('auth');       
        if(Auth::user() && (!Auth::user()->role==config('constants.PRINCIPAL_ROLE') || !Auth::user()->role==config('constants.SUPER_ADMIN_ROLE'))) {
            redirect(route('dashboard'));
        }
    }
    function index(){
            $passData = [];        
            $passData['departments'] = Department::select('department_name','department_id')->orderBy('department_id','DESC')->get()->toArray();            
            $passData['roles'] = [
                '-1'=>"All users",
                '0'=>"Super Admin",
                '1'=>"Principal",
                '2'=>"HOD",
                '3'=>"Officer",
                '4'=>"Student",
            ];       
        return view('pages.manage_users',$passData);
    }
    function get_data(Request $request){
        $result = [
            'status'=>false,
            'message'=>"OOPS! something went wrong"
        ];
        $data = $request->input();
        if($data){
            $table = "users";
            $depatmentTable = "departments";
            $query = DB::table($table)->select($table.'.name',$table.'.email ',$table.'.enrollment ',$table.'.contact',$table.'.role',$table.'.profile_pic',$table.'.department',$depatmentTable.'.department_name')->join($depatmentTable,$depatmentTable.'.department_id ',"=",$table.'.department');
            if($data['department'] && $data['department']>0){
                $query = $query->where($table.'.department',$data['department']);
            }
            if($data['role'] && $data['role']>0){
                $query = $query->where($table.'.role',$data['role']);
            }
            
            $count  = $query->count();
            if(isset($data['page_no']) && $data['page_no']!=""){
               $query =  $query->offset((((int)$data['page_no'])-1)*(int)config("constants.limit"))->limit((int)config("constants.limit"));
            }
            
            $result = [
                'count' => $count,
                'limit' =>  config("constants.limit"),
                "page_no" =>  (int)$data['page_no']
            ];
            $data = $query->get()->toArray();

            if(isset($data) && !empty($data)){
                $result['data'] = $data;
                $result['status'] = true;
                $result['message'] = "Successfully retrived data";
            }else{
                $result['status'] = false;
                $result['message'] = "No data found";
            }

        }
        return json_encode($result);
    }
}