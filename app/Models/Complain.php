<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\PseudoTypes\False_;

class Complain extends Model
{
    use HasFactory;
    protected $table = "complains";
    protected $Usertable = "users";
    // public $timestamps = true;
    public function insert_complain($data=[]){
        if(isset($data)){
            if(DB::table($this->table)->insert($data)){
                return true;
            }else{
                return false;
            }            
        }else{
            return false;
        }
        
    }
    public function update_complain($data=[],$complain_id){
        if(isset($data)){
            if(DB::table($this->table)->where('id',$complain_id)->update($data)){
                return true;
            }else{
                return false;
            }            
        }else{
            return false;
        }
    }
    public function get_data($id=0){
        $query = DB::table($this->table)->select($this->table.".*",$this->Usertable.".email",$this->Usertable.".name")->join($this->Usertable,$this->table.".id","=",$this->Usertable.".id");
        if($id>0){
            $query = $query->where($this->table.'.id', $id);
        }
        return $query->get()->toArray();
    }
    public function getComplainData($config=[]){
        
        if(empty($config) || isset($config['not_allowed'])){
            return false;
        }
        $query = DB::table($this->table)->select($this->table.".*",$this->Usertable.".email",$this->Usertable.".name")->join($this->Usertable,$this->table.".id","=",$this->Usertable.".id");
        if(isset($config['user_id'])){
            $query = $query->where($this->table.'.user_id',$config['user_id']); 
        }
        if(isset($config['department']) && trim($config['department'])!=""){
            $query = $query->where($this->table.'.department',$config['department']); 
        }
        if(isset($config['institute']) && trim($config['institute'])!=""){
            $query = $query->where($this->table.'.institute',$config['institute']); 
        }    
        if(isset($config['status']) && $config['status']!=config("constants.all")){
            $query = $query->where($this->table.'.status',$config['status']); 
        }   
        if(isset($config['search']) && trim($config['search'])!=""){
            $query = $query->where($this->table.'.message','like',"%".$config['search']."%"); 
        }
           
        if(isset($config['sort_by']) && $config['sort_by']=="date_asc" ){
            $query->orderBy($this->table.'.updated_at','asc');
        }else{
            $query->orderBy($this->table.'.updated_at','desc');
        }
        $count  = $query->count();
        $query->offset((((int)$config['page_no'])-1)*(int)config("constants.limit"))->limit((int)config("constants.limit"));
        
        $returnData = [
            'count' => $count,  
            'limit' =>  config("constants.limit"),    
            "page_no" =>  (int)$config['page_no']
        ];
        if(((int)$config['page_no'])<ceil($count/(int)config("constants.limit"))){
            $returnData['next'] = TRUE;
        }else{
            $returnData['next'] = FALSE;
        }
        $returnData['data'] = $query->get()->toArray();
        
        return $returnData;
    }
}
