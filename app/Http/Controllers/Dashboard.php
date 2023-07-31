<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $passData = [];
        $role = Auth::user()->role;

        if ($role == config("constants.PRINCIPAL_ROLE") || $role == config("constants.SUPER_ADMIN_ROLE") || $role == config("constants.OFFICER_ROLE")) {
            $passData['departments'] = Department::select('departments', 'department_id')->orderBy('department_id', 'DESC')->get()->toArray();
        }
        $passData['sort_by'] = [
            "date_desc" => 'Date Descending',
            "date_asc" => 'Date Ascending',
        ];
        date_default_timezone_set("Asia/Kolkata");
        $passData['today_date'] = date('Y-m-d');
        $passData['last_month_date'] = date("Y-m-d", strtotime(date("Y-m-d", strtotime(date("Y-m-d"))) . "-1 month"));

        if ($role == config('constants.HOD_ROLE') || $role == config('constants.SUPER_ADMIN_ROLE') || $role == config('constants.PRINCIPAL_ROLE')) {
            $passData['default_status'] = config('constants.APPROVED');
        }
        if ($role == config('constants.OFFICER_ROLE')) {
            $passData['default_status'] = config('constants.PENDING');
        }

        return view('pages.dashboard', $passData);
    }
}
