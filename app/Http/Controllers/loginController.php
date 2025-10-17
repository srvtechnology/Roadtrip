<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Validator;
use Hash;
use \Redirect;
use Mail;
use Crypt;
use Exception;
use App\AdminUser;
use GlobalVars;
class loginController extends Controller
{
    //
	public function landing() {
        return view('login');
      }

    

		    public function dologin(Request $request)
    {
        		$email=$request->input('email');
        		$password=$request->input('password');

        try{    
           
            //$request->session()->flash('error','Please Enter All Fields');
                
            
                $checkUserstatus = AdminUser::where('email', $request->input('email'))->first();
                
                if ($checkUserstatus) {
                    $auth = auth()->guard('admin')->attempt([
                        'email'     => $request->input('email'),
                        'password'  => $request->input('password')
                    ]);
                    if ($auth) {
                    	$session="roadtrip_admin";
                       session(['roadtrip_admin' => $session]);
                        return Redirect::Route('dashboard');
                    } else {
                        $request->session()->flash('error', 'Invalid Username or Password');
                        return \Redirect::Route('admin_login');
                    }
                } else {
                    $request->session()->flash('error', 'You are not an authorized user');
                    return \Redirect::Route('admin_login');
                }
            }
        catch(Exception $e){
            throw new \App\Exceptions\AdminException($e->getMessage());
        }
    }

    public function logout(Request $request)
    {
        try{
          Auth::logout();
            session()->forget('roadtrip_admin');
      
             session()->flush(); 
            return \Redirect::Route('admin_login');
        }catch(Exception $e){
            throw new \App\Exceptions\AdminException($e->getMessage());
        }        
    }

    
}
