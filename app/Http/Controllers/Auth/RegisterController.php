<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    
    protected function validator(array $data)
    {
        // print_r(Validator::make($data, [
        //     'name' => ['required', 'string', 'max:80'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'enrollment' => ['required','integer', 'min:100000000000','nullable', 'max:999999999999', 'unique:users'],     
        //     'contact' => ['required','integer', 'min:10', 'max:10', 'unique:users'],            
        //     'password' => ['required', 'string', 'min:8', 'confirmed'],
        // ]));
        if(isset($data['enrollment'])){
            return Validator::make($data, [
                'name' => ['required', 'string', 'max:80'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'enrollment' => ['required','integer', 'min:100000000000','nullable', 'max:999999999999', 'unique:users'],     
                'contact' => ['required','integer', 'min:1000000000', 'max:9999999999', 'unique:users'],            
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ],[
                'enrollment.min'=>"The Enrollment no. must be of 12 digit",
                'enrollment.max'=>"The Enrollment no. must be of 12 digit",
                "contact.min"=>"Please Enter Valid 10 digit Contact No.",
                "contact.max"=>"Please Enter Valid 10 digit Contact No.",
            ]);
        }else{
            return Validator::make($data, [
                'name' => ['required', 'string', 'max:80'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'department'=>['required'],
                'institute'=>['required'],
                'contact' => ['required','integer', 'min:10', 'max:10', 'unique:users'],            
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ],[                
                "contact.min"=>"Please Enter Valid 10 digit Contact No.",
                "contact.max"=>"Please Enter Valid 10 digit Contact No.",
            ]);
        }
        
    }
    
    

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $department = $institute = $enrollment = null;
        $role = '4';
        $profile_pic = 'images/avtar1.jpg';
        if(isset($data['role'])){
            $role = $data['role'];
        }
        if(isset($data['profile_pic'])){
            $profile_pic = $data['profile_pic'];
        }
        if(isset($data['enrollment'])){
            $enrollment = $data['enrollment'];
            $institute = substr($enrollment,2,3);
            $department = substr($enrollment,7,2);
        }else{
            $department = $data['department'];
            $institute = $data['institute'];
        }
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'enrollment'=>$enrollment,
            'role'=>$role,
            'institute'=>$institute,
            'department'=>$department,
            'contact'=>$data['contact'],
            'password' => Hash::make($data['password']),
            'profile_pic'=> $profile_pic
            
        ]);
    }
}
