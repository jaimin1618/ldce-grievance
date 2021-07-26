<?php

namespace App\Http\Controllers;

use App\Mail\StatusMail;
use App\Models\Complain as ComplainModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\VarDumper\Cloner\Data;

class Complain extends My_controller
{
    protected $model;
    public function __construct() {
        $this->model = new ComplainModel();
    }
    public function insert(Request $req){
        if(isset($req)){
            $data = $req->input();
            if(isset($this->user()->id) && isset($data['_token'])){
                $user_id =  $this->user()->id;
                $message = "";
                if(isset($data['message']) && trim($data['message'])!=""){
                    $message = $data['message'];
                }else{
                    return $this->return_message(false,"Message is required field");
                }
                $Insertdata = [
                    'message'=>$message,
                    'user_id'=>$this->user()->id,
                    'department'=>$this->user()->department,
                    'institute'=>$this->user()->institute,
                    'status'=>config('constants.PENDING'),                    
                ];
                if(isset($data['show_identity'])){
                    $Insertdata['show_identity'] = 1;
                }
                if($req->hasFile('grievanceimg')){
                    $imageName = $req->file('grievanceimg')->getClientOriginalName();
                    $timestamp = strtotime("now");
                    $imageName = "grieavance_img".$user_id.$timestamp.".".explode(".",$imageName)[1];                     
                    $path = 'public/images/grievanceimages';
                    if($req->file('grievanceimg')->storeAs($path,$imageName)){
                        $Insertdata['image'] = $imageName;
                    }else{
                        return $this->return_message(false,"File cant be uploaded.");
                    }                                          
                   
                }
                
                if(!$this->model->insert_complain($Insertdata)){
                    return $this->return_message(false,"OOps!! something went wrong.");
                }
                               
                return $this->return_message(true,"Your complain is succesfully submited");
                
            }else{
                return $this->return_message(false,"Un autherized user");
            }
        }
            
        return $this->return_message(false,"Un autherized user");
    }

    public function updateStatus(Request $req){
        //need to pass
            //complain_id
            //status
            // message(message by officer || return message)
        if(isset($req) && isset($req->input()['_token'])){
            $data = $req->input();
            $complain_id = $data['complain_id'];
            $status = $data['status'];
            $message = $data['message'];
            $role = $this->user()->role;
            //only acees to officer,principal,super admin            
            if(($role==config('constants.SUPER_ADMIN_ROLE') || $role==config('constants.PRINCIPAL_ROLE') || $role==config('constants.OFFICER_ROLE')) && ($status==config('constants.REJECTED') || $status==config('constants.APPROVED'))){
                $updatable_data = [
                    "status"=>(string)$status,
                    "officer_message"=>$message
                ];                
                $userData = $this->model->get_data($complain_id);
                if(isset($userData) && !empty($userData)){
                    if($this->model->update_complain($updatable_data,$complain_id)){
                        $changedStatus = "approved";
                        $stattusMessage = "Complain is approved succefully";
                        if($status==config('constants.REJECTED')){
                            $stattusMessage = "Complain is Rejected succefully";
                            $changedStatus = "rejected";
                        }
                      
                        $mailData = [
                            "status" => $changedStatus,
                            "name"=>$userData[0]->name,
                            "message"=>$message
                        ];

                        Mail::to($userData[0]->email)->send(new StatusMail($mailData));
                        return $this->return_message(true,$stattusMessage);
                   }
                }
                else{
                    return $this->return_message(false,"Complain not found");
                }
                    
               
            }

            //only acees to principal,principal,super admin
            if(($role==config('constants.SUPER_ADMIN_ROLE') || $role==config('constants.PRINCIPAL_ROLE') || $role==config('constants.HOD_ROLE')) && ($status==config('constants.IN_PROGRESS') || $status==config('constants.COMPLETED'))){
                $updatable_data = [
                    "status"=>(string)$status,
                    "return_message"=>$message
                ];
                $userData = $this->model->get_data($complain_id);
                if($this->model->update_complain($updatable_data,$complain_id)){
                    $changedStatus = "In-progress";
                    $stattusMessage = "Complain status changed to \'in Progress\' successfully";
                    if($status==config('constants.COMPLETED')){
                        $stattusMessage = "Complain status changed to \'Completed\' successfully";
                    }
                    $mailData = [
                        "status" => $changedStatus,
                        "name"=>$userData[0]->name,
                        "message"=>$message
                    ];

                    Mail::to($userData[0]->email)->send(new StatusMail($mailData));
                    
                    
                    return $this->return_message(true,$stattusMessage);
               }
            }
            //only acees to hod,principal,super admin
            if($role==config('constants.HOD_ROLE') && $status==config('constants.SEEN')){
                $updatable_data = [
                    "status"=>(string)$status                    
                ];                

                $this->model->update_complain($updatable_data,$complain_id);
            }

            return $this->return_message(false,"You have not permission to do this action");
        }else{
            return $this->return_message(false,"Un autherized user");   
        }
    }
    public function get_data(Request $req){
        //need 
        //students
            //sort_by : {date_asc|date_desc}
            //page_no
            //search
        //officer & principal
            //sort_by : {date_asc|date_desc}
            //page_no
            //search
            //department
            //status
        //HOD_ROLE
            //sort_by : {date_asc|date_desc}
            //page_no
            //search            
            //status
        //super aAdmin
            //sort_by : {date_asc|date_desc}
            //page_no
            //search
            //institute
            //department
            //status

        $data = $req->input();
        if($this->user()!=null && !empty($data) && $req->hasHeader("X-CSRF-TOKEN")){
            $role = $this->user()->role;

            $config = ["not_allowed","true"];
            
            if($role==config("constants.STUDENT_ROLE")){
                $config = [
                    "user_id" => $this->user()->id,
                    "sort_by" => $data['sort_by']
                ];                
            }
            if($role==config("constants.OFFICER_ROLE") || $role==config("constants.PRINCIPAL_ROLE")){                
                if($data['status'] != config("constants.PENDING") && $data['status'] != config("constants.REJECTED") && $data['status'] != config("constants.APPROVED")){
                    return $this->return_message(false,"You are not allow to access");
                }
                $config = [                    
                    "status"=>$data['status'],
                    "institute"=>$this->user()->institute,                    
                    "sort_by" => $data['sort_by']
                ];
                if(isset($data['department']) && trim($data['department'])!="" && $data['department']!=null){
                    $config['department'] = $data['department'];
                }
            }
            if($role==config("constants.HOD_ROLE")){
                
                $config = [  
                    "department"=>$this->user()->department,
                    "institute"=>$this->user()->institute,
                    "status"=>$data['status'],
                    "sort_by" => $data['sort_by']
                ];                
            }
            if($role==config("constants.SUPER_ADMIN_ROLE")){
                
                $config = [  
                    "status"=>$data['status'],
                    "sort_by" => $data['sort_by']
                ];    
                if(isset($data['department']) && trim($data['department'])!="" && $data['department']!=null){
                    $config['department'] = $data['department'];
                }
                if(isset($data['institute']) && trim($data['institute'])!="" && $data['institute']!=null){
                    $config['institute'] = $data['institute'];
                }            
            }
            
            //add pagination
            if(isset($data['page_no']) && $data['page_no']!=""){
                $config['page_no'] = $data['page_no'];
            }else{                
                $config['page_no'] = 1;
            }   

            //add search functionality
            if(isset($data['search']) && trim($data['search']) != ""){
                $config['search'] = $data['search'];
            }            
            $returnData = $this->model->getComplainData($config);
            if(isset($returnData) && !empty($returnData)){
                $returnData['status'] = true;
                return json_encode($returnData);
            }else{
                return $this->return_message(false,"OOPS! something went wrong");
            }
            
        }
    }
}
