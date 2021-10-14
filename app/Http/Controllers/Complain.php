<?php

namespace App\Http\Controllers;

use App\Mail\StatusMail;
use App\Models\Complain as ComplainModel;
use App\Models\Department;
use Composer\XdebugHandler\Status;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\VarDumper\Cloner\Data;
use \Soundasleep\Html2Text as TextCoverter;

class Complain extends My_controller
{
    protected $model;
    public function __construct()
    {
        $this->model = new ComplainModel();
    }
    public function addComplain()
    {
        if (Auth::user() && Auth::user()->role == config('constants.STUDENT_ROLE')) {
            $passData = [];
            $passData['departments'] = Department::select('department_name', 'department_id')->orderBy('department_id', 'DESC')->get()->toArray();

            return view('pages.add_grievance', $passData);
        } else {
            return redirect(route('dashboard'));
        }
    }
    public function insert(Request $req)
    {
        if (isset($req)) {
            $data = $req->input();
            if (isset($this->user()->id) && isset($data['_token'])) {
                $user_id =  $this->user()->id;
                $title = "";
                if (isset($data['title']) && trim($data['title']) != "") {
                    if (strlen($data['title']) > 100) {
                        return $this->return_message(false, "Title can be maximum 100 character long");
                    }
                    $title = $data['title'];
                } else {
                    return $this->return_message(false, "Title is required field");
                }
                $message = "";
                if (isset($data['message']) && trim($data['message']) != "") {
                    $message = $data['message'];
                } else {
                    return $this->return_message(false, "Message is required field");
                }
                $department_id = "";
                if (isset($data['department_id'])) {
                    $department_id = $data['department_id'];
                } else {
                    return $this->return_message(false, "Select Department ,It is required");
                }
                $Insertdata = [
                    "title" => $title,
                    'message' => $message,
                    'user_id' => $this->user()->id,
                    'department' => $department_id,
                    'institute' => $this->user()->institute,
                    'status' => config('constants.PENDING'),
                ];
                if (isset($data['show_identity'])) {
                    $Insertdata['show_identity'] = 1;
                }
                if ($req->hasFile('grievanceimg')) {
                    $imageName = $req->file('grievanceimg')->getClientOriginalName();
                    $fileSize = $req->file('grievanceimg')->getSize();
                    $fileType = $req->file('grievanceimg')->getClientMimeType();

                    if ($fileSize > 10000000) {
                        return  $this->return_message(false, "file size must be less than 10MB");
                    }
                    if (!($fileType == "image/png" || $fileType == "image/jpeg" || $fileType == "image/jpg")) {
                        return  $this->return_message(false, "Only png | jpeg | jpg are allowed types ");
                    }
                    $timestamp = strtotime("now");
                    $imageName = "grieavance_img" . $user_id . $timestamp . "." . explode(".", $imageName)[1];
                    $path = 'public/images/grievanceimages';
                    if ($req->file('grievanceimg')->storeAs($path, $imageName)) {
                        $Insertdata['image'] = $imageName;
                    } else {
                        return $this->return_message(false, "File cant be uploaded.");
                    }
                }
                // echo "<pre>";
                // print_r($Insertdata);
                // die;
                if (!$this->model->insert_complain($Insertdata)) {
                    return $this->return_message(false, "OOps!! something went wrong.");
                }

                return $this->return_message(true, "Your complain is succesfully submited");
            } else {
                return $this->return_message(false, "Un autherized user");
            }
        }

        return $this->return_message(false, "Un autherized user");
    }

    public function updateStatus(Request $req)
    {
        //need to pass
        //complain_id
        //status
        // message(message by officer || return message)
        if (isset($req) && isset($req->input()['_token'])) {
            $data = $req->input();
            $complain_id = $data['complain_id'];
            $status = $data['status'];
            $message = $data['message'];
            $role = $this->user()->role;
            //only acees to officer,principal,super admin            
            if (($role == config('constants.SUPER_ADMIN_ROLE') || $role == config('constants.PRINCIPAL_ROLE') || $role == config('constants.OFFICER_ROLE')) && ($status == config('constants.REJECTED') || $status == config('constants.APPROVED'))) {
                $updatable_data = [
                    "status" => (string)$status,
                    "officer_message" => $message
                ];
                $userData = $this->model->get_data($complain_id);
                if (isset($userData) && !empty($userData)) {
                    if ($this->model->update_complain($updatable_data, $complain_id)) {
                        $changedStatus = "approved";
                        $stattusMessage = "Complain is approved succefully";
                        if ($status == config('constants.REJECTED')) {
                            $stattusMessage = "Complain is Rejected succefully";
                            $changedStatus = "rejected";
                        }

                        $mailData = [
                            "status" => $changedStatus,
                            "name" => $userData[0]->name,
                            "given_message" => $message
                        ];

                        Mail::to($userData[0]->email)->send(new StatusMail($mailData));
                        return $this->return_message(true, $stattusMessage);
                    }
                } else {
                    return $this->return_message(false, "Complain not found");
                }
            }

            //only acees to principal,principal,super admin
            if (($role == config('constants.SUPER_ADMIN_ROLE') || $role == config('constants.PRINCIPAL_ROLE') || $role == config('constants.HOD_ROLE')) && ($status == config('constants.IN_PROGRESS') || $status == config('constants.COMPLETED'))) {
                $updatable_data = [
                    "status" => (string)$status,
                    "return_message" => $message
                ];
                $userData = $this->model->get_data($complain_id);
                if ($this->model->update_complain($updatable_data, $complain_id)) {
                    $changedStatus = "In-progress";
                    $stattusMessage = "Complain status changed to \'in Progress\' successfully";
                    if ($status == config('constants.COMPLETED')) {
                        $stattusMessage = "Complain status changed to \'Completed\' successfully";
                        $changedStatus = "completed";
                    }
                    $mailData = [
                        "status" => $changedStatus,
                        "name" => $userData[0]->name,
                        "given_message" => $message
                    ];

                    Mail::to($userData[0]->email)->send(new StatusMail($mailData));


                    return $this->return_message(true, $stattusMessage);
                }
            }
            //only acees to hod,principal,super admin
            if ($role == config('constants.HOD_ROLE') && $status == config('constants.SEEN')) {
                $updatable_data = [
                    "status" => (string)$status
                ];

                $this->model->update_complain($updatable_data, $complain_id);
            }

            return $this->return_message(false, "You have not permission to do this action");
        } else {
            return $this->return_message(false, "Un autherized user");
        }
    }
    public function get_data(Request $req)
    {
        //need 
        //students
        //sort_by : {date_asc|date_desc}
        //page_no
        //search
        //status
        //from_date
        //end_date
        //officer & principal
        //sort_by : {date_asc|date_desc}
        //page_no
        //search
        //department
        //status
        //from_date
        //end_date
        //HOD_ROLE
        //sort_by : {date_asc|date_desc}
        //page_no
        //search            
        //status
        //from_date
        //end_date
        //super aAdmin
        //sort_by : {date_asc|date_desc}
        //page_no
        //search
        //institute(not compulsary)
        //department
        //status
        //from_date
        //end_date

        $data = $req->input();

        if ($this->user() != null && !empty($data)) {
            $role = $this->user()->role;

            $config = ["not_allowed", "true"];

            if ($role == config("constants.STUDENT_ROLE")) {
                $config = [
                    "user_id" => $this->user()->id,
                    "sort_by" => $data['sort_by'],
                    "status" => $data['status']
                ];
            }
            if ($role == config("constants.OFFICER_ROLE") || $role == config("constants.PRINCIPAL_ROLE")) {
                // if($data['status'] != config("constants.PENDING") && $data['status'] != config("constants.REJECTED") && $data['status'] != config("constants.APPROVED") && $data['status'] != ''){
                //     return $this->return_message(false,"You are not allow to access");
                // }
                $config = [
                    "status" => $data['status'],
                    "institute" => $this->user()->institute,
                    "sort_by" => $data['sort_by']
                ];
                if (isset($data['department']) && trim($data['department']) != "" && $data['department'] != null  && $data['department'] > 0) {
                    $config['department'] = $data['department'];
                }
            }
            if ($role == config("constants.HOD_ROLE")) {

                $config = [
                    "department" => $this->user()->department,
                    "institute" => $this->user()->institute,
                    "status" => $data['status'],
                    "sort_by" => $data['sort_by']
                ];
            }
            if ($role == config("constants.SUPER_ADMIN_ROLE")) {

                $config = [
                    "status" => $data['status'],
                    "sort_by" => $data['sort_by']
                ];
                if (isset($data['department']) && trim($data['department']) != "" && $data['department'] != null && $data['department'] > 0) {
                    $config['department'] = $data['department'];
                }
                if (isset($data['institute']) && trim($data['institute']) != "" && $data['institute'] != null) {
                    $config['institute'] = $data['institute'];
                }
            }

            //add pagination
            if (isset($data['page_no']) && $data['page_no'] != "") {
                $config['page_no'] = $data['page_no'];
            } else {
                $config['page_no'] = 1;
            }
            //getAll data 
            if (isset($data['all_data'])) {
                $config['page_no'] = -1;
            }
            //add search functionality
            if (isset($data['search']) && trim($data['search']) != "") {
                $config['search'] = $data['search'];
            }
            if (isset($data['from_date']) && $data['from_date'] != "") {
                $config['from_date'] = $data['from_date'];
            }
            if (isset($data['end_date']) && $data['end_date'] != "") {
                $to_date = $data['end_date'];
                $to_date = trim($to_date);
                $datetime = new DateTime($to_date);
                $datetime->modify('+1 day');
                $to_date = $datetime->format('Y-m-d');
                $config['end_date'] = $to_date;
            }
            // print_r($config);
            // die;

            $returnData = $this->model->getComplainData($config);
            if (isset($data['from_export'])) {

                $fileName = 'grivance' . $config['from_date'] . '_to_' . $config['end_date'] . '.csv';
                $Exportdata = $returnData['data'];

                $headers = array(
                    "Content-type"        => "text/csv",
                    "Content-Disposition" => "attachment; filename=$fileName",
                    "Pragma"              => "no-cache",
                    "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
                    "Expires"             => "0"
                );

                $columns = array('Id', 'Title', "status", 'Message', 'Student Name', 'Allocated department');

                $callback = function () use ($Exportdata, $columns) {
                    $file = fopen('php://output', 'w');
                    fputcsv($file, $columns);

                    foreach ($Exportdata as $key => $task) {
                        $row['id']  = $key + 1;
                        $row['message']  =  preg_replace("/\n\s+/", "\n", rtrim(html_entity_decode(str_replace('&nbsp;', ' ', strip_tags(str_replace('</li>', ', &nbsp;</li>',$task->message), ENT_HTML5)))));

                        $row['title']    = $task->title;
                        $row['name']  = $task->name;
                        $row['department_name']  = $task->department_name;

                        $row['status'] = $this->set_complaiun_status($task->status);

                        fputcsv($file, array($row['id'], $row['title'], $row['status'], $row['message'], $row['name'], $row['department_name']));
                    }

                    fclose($file);
                };

                return response()->stream($callback, 200, $headers);
            } else {
                if (isset($returnData) && !empty($returnData)) {
                    $returnData['status'] = true;

                    return json_encode($returnData);
                } else {
                    return $this->return_message(false, "OOPS! something went wrong");
                }
            }
        }
    }
    protected function set_complaiun_status($status)
    {
        switch ($status) {
            case config('constants.PENDING'):
                return "Pending";
            case config('constants.REJECTED'):
                return "Rejected";
            case config('constants.APPROVED'):
                return "Approved";
            case config('constants.SEEN'):
                return "SEEN";
            case config('constants.IN_PROGRESS'):
                return "In Progress";
            case config('constants.COMPLETED'):
                return "Completed";
        }
    }
    public function get_complain_counts(Request $req)
    {
        $data = $req->input();
        $department = Auth::user()->department;
        if (isset($data['department'])) {
            $department = $data['department'];
        }
        // $passData['today_date'] = date('Y-m-d');
        $from_date = $from_date = date("Y-m-d", strtotime(date("Y-m-d", strtotime(date("Y-m-d"))) . "-1 month"));
        if (isset($data['from_date'])) {
            $from_date = $data['from_date'];
        }
        $to_date = date("Y-m-d", strtotime('tomorrow'));
        if (isset($data['to_date'])) {
            $to_date = $data['to_date'];
            $to_date = trim($to_date);
            $datetime = new DateTime($to_date);
            $datetime->modify('+1 day');
            $to_date = $datetime->format('Y-m-d');
        }
        $passData = [
            'department' => $department,
            'from_date' => $from_date,
            'to_date' => $to_date
        ];
        if (Auth::user()->role == config('constants.STUDENT_ROLE')) {
            $passData['user_id'] = Auth::user()->id;
        }
        $complains = $this->model->getComplainCount($passData);
        if (isset($complains) && !empty($complains)) {
            return json_encode([
                "status" => true,
                "data" => $complains
            ]);
        } else {
            return json_encode([
                "status" => false,
                "msg" => "NO data found"
            ]);
        }
    }
}
