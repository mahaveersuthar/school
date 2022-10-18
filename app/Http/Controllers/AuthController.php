<?php

namespace App\Http\Controllers;
use Hash;
use Session;
use App\Models\AuthModel;

use \Illuminate\Contracts\Auth\Authenticatable;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AuthController extends Controller 
{
    public function index(){
        return view('loginPage');

    }
    public function signup(){
        return view('signup');
    }
    public function Registration(Request $request){
        $request->validate([
            'name' => 'required',
            'email'=>'required | email | unique:registration',
            'password'=>'required | confirmed | min:6',
            'password_confirmation'=>'required | min:6'
        ]);
        // return $request;
        $data=$request->all();
        $check=$this->create($data);
        $username=$request->name;
        return redirect("student")->withSuccess('You have successfully registered and signed in')->with('name',$username);
    }
    public function create(array $data){
        return AuthModel::create([
            'name'=>$data['name'],
            'email'=>$data['email'],
            'password'=>$data['password'],
            'cnf_password'=>$data['password_confirmation']
        ]);
    }
    // public function dashboard (){
    //     return view('student');
    // }
    public function login(Request $request){
        $request-> validate([
            'email'=>'required',
            'password'=>'required',
        ]);
        // $credentials=$request->only('email','password');
        // dd($credentials);
        $tbl_data=AuthModel::where('password',$request->password)->where("email",$request->email)->get();
        if($tbl_data=='[]'){
            return redirect()->back()->with('message','E-mail and Password is Worng');
        }else{
            $username=$tbl_data[0]->name;
            // return $username;
            session()->put('name',$username);
            return redirect('dashboard');
            // return $session;

        }

        // $tbl_data=AuthModel::find();
            // return $tbl_data;
        // return $credentials;

        // if (Auth::guard('user_login')->attempt($credentials)){

        //     $user_name='user';
        //     return redirect()->intended('student')->with('message','You have Successfully signed in')->with('name',$user_name);
        //     return redirect()->intended('student')->with('message','You have Successfully signed in');
        // }
        // return $data;
        // return redirect('loginPage')->with('message','You are not allowed to access');
    }

        public function dashboard(){
            return view('dashboard');
        }

    public function logout(){
        Session::flush();
        // Auth::guard('user_login')->logout();
        return redirect('/');
    }
}
