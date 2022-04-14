<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \Illuminate\Http\Response;
use Auth;
use \Validator;
use \Hash;
use \Redirect;
use Exception;
use GlobalVars;
use App\User;
use App\AdminUser;


class userController extends Controller
{
    //

    public function user_list(Request $request)
    {
        $user_list= User::orderby('user_id','DESC')->get();
        return view('user_list',['user_list'=> $user_list]);
    }

    public function change_status(Request $request)
    {
                $status=$request->input('status');

                $user_id=$request->input('user_id');
            $approved=User::where('user_id',$user_id)->limit('1')->update(['user_active_status'=>$status]);
              if ($approved) {
                # code...
                if ($status=='0') {
                    # code...
                    return Response()->json(['flag' => 'false', "message" => "User Disabled"], Response::HTTP_OK);
                }else{
                    return Response()->json(['flag' => 'true', "message" => "User Active"], Response::HTTP_OK);
                }
                
              }
    }

    public function forgot_password_mail($serect_key, $email, $secutity_token)
    {
        $decode_email=base64_decode($email);
        $decode=base64_decode($decode_email);

        $chk_secret_key=md5($decode_email);
        $decode_email=hash('sha256', $decode_email);
        
        if ($chk_secret_key==$serect_key && $decode_email==$secutity_token ) {
            # code...
            $chk_link=User::where('email',$decode)->where('user_active_status','1')->where('password_link_status','1')->count();
            if ($chk_link == '1') {
            	# code...
            	return view('update_password',['email' => $decode]);
            }else{
            	return view('token_expired');

            }
            
          }else{
           echo "You are not authorized";
           
        }
        
    }

    public function update_password(Request $request)
    {
        // {password: "adsvasca", confirm_password: "scascasc", user_email: "ios10@mailinator.com"}


        if (empty($request->password) || empty($request->confirm_password)) {
            # code...
            

            return Response()->json(['flag' => 'false', "message" => "Please fill all fields"], Response::HTTP_OK);

        }else{
            if (strlen($request->password) < 8 || strlen($request->confirm_password) < 8){
            # code...
        return Response()->json(['flag' => 'false', "message" => "Password must be at least 8 characters"], Response::HTTP_OK);
        } 
            if ($request->password != $request->confirm_password) {
                return Response()->json(['flag' => 'false', "message" => "Please match password with confirm password"], Response::HTTP_OK);
            }else{
                 $chk=User::where('email',$request->user_email)->where('user_active_status','1')->where('password_link_status','1')->first();
                 
            if ($chk) {
            # code...
                    $data=User::where('email',$request->user_email)->where('user_active_status','1')->get();

                     $user                       =  User::find($data[0]->user_id);
                     $user->password             =  Hash::make($request->password);
                     $user->password_link_status =  '0';
                     if ($user->save()) {
                         # code...
                        return Response()->json(['flag' => 'true', "message" => "Your password successfully updated"], Response::HTTP_OK);
                     }else{
                        return Response()->json(['flag' => 'false', "message" => "Try again"], Response::HTTP_OK);
                     }

           }else{
            return Response()->json(['flag' => 'false', "message" => "You are not authorized user"], Response::HTTP_OK);
           }
            }
           
        }

        
        
    }

     public function privacy_policy()
    {

        return view('privacy_policy');

    }

    public function terms_condition()
    {

        return view('terms_condition');

    }
     public function about()
    {

        return view('about');

    }

    

   
}
