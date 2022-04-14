<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\User;
use Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use \Mail;
use Validator;

class userController extends Controller
{

    private $userSelectedArray = array('user_id'
        , 'name', 'email', 'signup_type'
        , 'profile_pic', 'user_active_status');

    public function login(request $request)
    {

         header('Content-Type: text/html; charset=utf-8');

        $validator = Validator::make($request->all(), [
                'language_code'  => 'required', 
                //'user_id'        => 'required',            
        ]); 

        if ($validator->fails()) {  
        return response()->json(['error'=>$validator->errors()], 401); 
        }



        if (self::checkValidationLogIn($request)) {

            $userSelectedArrayLogIn = array('user_id'
                , 'name', 'email', 'signup_type'
                , 'profile_pic', 'user_active_status', 'password');

            $user = User::select($userSelectedArrayLogIn)
                ->where('email', $request->input('email'))
                ->first();
                //dd($user);



               //if the email is wrong.
                if(!$user){
                if($request->language_code=="en"){
                 $response = array('flag' => "false", 'status_code' => '1001', 'message' => "User not found");
                }
                elseif($request->language_code=="fr"){
                    $response = array('flag' => "false", 'status_code' => '1001', 'message' => "Utilisateur non trouvé ");
                }elseif($request->language_code=="de"){
                    $response = array('flag' => "false", 'status_code' => '1001', 'message' => "Teilnehmer nicht gefunden");
                }else{
                $response = array('flag' => "false", 'status_code' => '1001', 'message' => "User not found");
                }
                 return json_encode($response);

                }




                  //check wether this user login or not  3/31/2021
                if(@$user->user_active_status=="0"){

                    if($request->language_code=="en"){


                        $arr = array('flag' => 'false'
                        , "message" => 'Your Account is deactivated by admin'
                        , 'status_code' => '201');
 
                    }
                    elseif($request->language_code=="fr"){
                      
                      $json='"Vortre compte est désactivé"';

                        $arr = array('flag' => 'false'
                        , "message" => htmlentities(json_decode($json), ENT_COMPAT, 'UTF-8')
                        , 'status_code' => '201');
 
                    }
                    elseif($request->language_code=="de"){

                         $json='"Dein Konto wurde deaktiviert "';

                        $arr = array('flag' => 'false'
                        , "message" => htmlentities(json_decode($json), ENT_COMPAT, 'UTF-8')
                        , 'status_code' => '201');
 
                    }
                    else{


                        $arr = array('flag' => 'false'
                        , "message" => 'Your Account is deactivated by admin'
                        , 'status_code' => '201');
 
                    }

                    return json_encode($arr);
                }



            if ($user && Hash::check($request->input('password'), $user->password)) {

                unset($user->password);


                $arr = array('flag' => 'true'
                    , "message" => 'Successfully Sign In'
                    , 'status_code' => '201'
                    , 'profile' => $user);

                return json_encode($arr);

            } else {

                if($request->language_code=="en"){

                $arr = array('flag' => 'false', 'status_code' => '1001'
                    , "message" => 'Email or Password does not match');
                }
                elseif($request->language_code=="fr"){
                     $json='"E-mail ou le mot de passe ne correspond pas "';

                     $arr = array('flag' => 'false', 'status_code' => '1001'
                    , "message" =>  htmlentities(json_decode($json), ENT_COMPAT, 'UTF-8')
                );
                }

                
                elseif($request->language_code=="de"){
                     $json='"E-Mail oder Passwort stimmen nicht überein "';
                     $arr = array('flag' => 'false', 'status_code' => '1001'
                    , "message" => htmlentities(json_decode($json), ENT_COMPAT, 'UTF-8')
                );
                }
                    
                
                else{
                     $arr = array('flag' => 'false', 'status_code' => '1001'
                    , "message" => 'Email or Password does not match');
                }
                    
                }

                return json_encode($arr);

            }
                
        
    }

    public function checkValidationLogIn(request $request)
    {
        $check = true;

        $errorList = array();

        $email = $request->input('email');

        $password = $request->input('password');

        if (!isset($email)) {

            array_push($email, "Email Id missing.");

        }
        if (!isset($password)) {

            array_push($errorList, "Please Enter Password");

        }
        if (strlen($password) < 8) {

            if($request->language_code=="en"){
            array_push($errorList, "Password must be contain at least 8 characters");
            }
            elseif($request->language_code=="fr"){
                 $json='"Le mot de passe doit contenir au moins 8 caractères "';
              array_push($errorList, htmlentities(json_decode($json), ENT_COMPAT, 'UTF-8'));
            }
            elseif($request->language_code=="de"){
                 $json='"Passwort muss mindestens 8 Zeichen enthalten"';
                 array_push($errorList, htmlentities(json_decode($json), ENT_COMPAT, 'UTF-8'));
            }
            else{
                 array_push($errorList, "Password must be contain at least 8 characters");
            }

        }

        if (count($errorList) > 0) {

            $check = false;

            $response = array(

                'flag' => 'false'
                , 'status_code' => '1000',
                'message' => $errorList[0],

            );

            echo json_encode($response);
        }

        return $check;

    }
    public function isUserExistByEmail(request $request)
    {

        // $validator = Validator::make($request->all(), [
        //         'language_code'  => 'required', 
        //         //'user_id'        => 'required',            
        // ]); 

        // if ($validator->fails()) {  
        // return response()->json(['error'=>$validator->errors()], 401); 
        // }

        $response = array('flag' => "false", 'status_code' => '2000', 'message' => "No response");

        $email = $request->input('email');

        if (isset($email)) {

            $user = User::where('email', '=', $email)->select($this->userSelectedArray)->first();

            if ($user) {

                $response = array('flag' => "true"
                    , 'status_code' => '201'
                    , 'message' => "User Found"
                    , 'profile' => $user);

            } else {

                if($request->language_code=="en"){
                 $response = array('flag' => "false", 'status_code' => '1001', 'message' => "User not found");
                }
                elseif($request->language_code=="fr"){
                    $response = array('flag' => "false", 'status_code' => '1001', 'message' => "Utilisateur non trouvé ");
                }elseif($request->language_code=="de"){
                    $response = array('flag' => "false", 'status_code' => '1001', 'message' => "Teilnehmer nicht gefunden");
                }else{
                $response = array('flag' => "false", 'status_code' => '1001', 'message' => "User not found");
                }

            }

        } else {

            $response = array('flag' => "false", 'status_code' => '1000', 'message' => "Please Enter Email Id");

        }

        return json_encode($response);
    }

    public function signUp(request $request)
    {

        if (self::checkValidationForSignUp($request)) {

            return self::signUpWithValidation($request);

        }
    }

    public function signUpWithValidation(request $request)
    {

        $response = array('flag' => "false", 'status_code' => '2000', 'message' => 'No respose');

        $email = $request->input('email');

        $isUserAlreadyExist = User::where('email', '=', $email)->first();

        if ($isUserAlreadyExist) {

            $response = array('flag' => "false", 'status_code' => '1001', 'message' => 'User Already Exist By this email id');

        } else {

            $name = $request->input('name');

            $password = $request->input('password');

            $signUpType = $request->input('signup_type');

            $social_id = $request->input('social_id');

            $platfrom = $request->input('platfrom');

            $newUser = new User;

            if (isset($name)) {
                $newUser->name = $name;
            } else {
                $newUser->name = "";
            }

            $newUser->email = $email;

            if (isset($social_id)) {
                $newUser->social_id = $social_id;
            }

            if (isset($password)) {
                $newUser->password = Hash::make($password);
            }

            $newUser->signup_type = strtoupper($signUpType);

            $newUser->profile_pic = "";

            $newUser->platfrom = $platfrom;

            $newUser->user_active_status = 1;

            if ($newUser->save()) {

                unset($newUser->password);
                unset($newUser->platfrom);
                unset($newUser->updated_at);
                unset($newUser->created_at);
                unset($newUser->social_id);

                $response = array('flag' => "true", 'status_code' => '201'
                    , 'message' => 'Successfully Registered'
                    , 'profile' => $newUser);

                //self::sendWelcomeMail($newUser);

            } else {

                $response = array('flag' => "false", 'status_code' => '2000', 'message' => 'Fail to sign up');

            }

        }

        return json_encode($response);
    }

    public function checkValidationForSignUp(request $request)
    {
        $check = true;

        $errorList = array();

        $signUpTypeArray = array('GP', 'FB', 'NL');

        $platfromArray = array('android', 'ios', 'web');

        $email = $request->input('email');

        $password = $request->input('password');

        $signUpType = $request->input('signup_type');

        $platfrom = $request->input('platfrom');

        $social_id = $request->input('social_id');

        if (!isset($email)) {

            array_push($email, "Email Id missing.");

        }

        if (!in_array($signUpType, $signUpTypeArray)) {

            array_push($errorList, "Invalid Signup Type");

        }

        if ($signUpType == $signUpTypeArray[2]) {

            if (!isset($password)) {

                array_push($errorList, "Please Enter Password");

            }
            if (strlen($password) < 8) {

                array_push($errorList, "Password must be contain at least 8 characters");

            }

        }

        if ($signUpType != $signUpTypeArray[2] && !isset($social_id)) {

            array_push($errorList, "Missing Social Id");

        }

        if (!isset($platfrom)) {

            array_push($errorList, "platfrom missing.");

        }

        if (!in_array($platfrom, $platfromArray)) {

            array_push($errorList, "Invalid platfrom");

        }

        if (count($errorList) > 0) {

            $check = false;

            $response = array(

                'flag' => 'false'
                , 'status_code' => '1000'
                , 'message' => $errorList[0],
            );

            echo json_encode($response);
        }

        return $check;

    }

    public function sendWelcomeMail($newUser)
    {
        $mailData = array(
            'organisationName' => 'Road Trip 2.0',
            'organisationEmail' => 'roadtrip.usa.southwest@gmail.com',
            'title' => 'Registration Success',
            'userName' => $newUser->name,
            'userId' => base64_encode($newUser->email),
            'userEmail' => $newUser->email,
            'url' => "url",
            'emailHeaderSubject' => 'Welcome to Road Trip 2.0',
        );
        Mail::send('emails.welcome_mail', $mailData, function ($message)
             use ($mailData) {
                $message->from($mailData['organisationEmail'], $mailData['organisationName']);
                $message->to($mailData['userEmail'], $mailData['organisationName'])->subject(config('global.SITE_ADDRESS_NAME') . $mailData['emailHeaderSubject']);
            });

    }


    public function sendFogotPasswordMail($email)
    {
        $mailData = array(
            'organisationName' => 'Road Trip 2.0',
            'organisationEmail' => 'roadtrip.usa.southwest@gmail.com',
            'title' => 'Reset Password on Roadtrip 2.0',
            'userName' => base64_encode($email),
            'userId' => base64_encode($email),
            'userEmail' => $email,
            'url' => "url",
            'emailHeaderSubject' => 'Reset Password',
        );
        Mail::send('emails.forgot_password', $mailData, function ($message)
             use ($mailData) {
                $message->from($mailData['organisationEmail'], $mailData['organisationName']);
                $message->to($mailData['userEmail'], $mailData['organisationName'])->subject(config('global.SITE_ADDRESS_NAME') . $mailData['emailHeaderSubject']);
            });

    }

    public function forgotPassword(request $request)
    {
        header('Content-Type: text/html; charset=utf-8');

        $validator = Validator::make($request->all(), [
                'language_code'  => 'required', 
                //'user_id'        => 'required',            
        ]); 

        if ($validator->fails()) {  
        return response()->json(['error'=>$validator->errors()], 401); 
        }


        $response = array('flag' => "false", 'status_code' => '2000', 'message' => "No response");

        $email = $request->input('email');

        if (isset($email)) {

            $user = User::where('email', '=', $email)->select($this->userSelectedArray)->first();

            if ($user) {

                if ($user->signup_type == 'NL') {

                    if($request->language_code=="en"){

                    $response = array('flag' => "true", 'status_code' => '201'
                        , 'message' => "A reset password link in send to your email id.",
                    );

                    }
                    elseif ($request->language_code=="fr") {
                        $json = '"Un lien de réinitialisation du mot de passe a été envoyé à votre identifiant E-mail"';

                       $response = array('flag' => "true", 'status_code' => '201'
                        , 'message' => htmlentities(json_decode($json), ENT_COMPAT, 'UTF-8')
                    );

                    }
                    elseif ($request->language_code=="de") {
                         $json = '"Du erhältst einen Link zum Zurücksetzen deines Passworts."';
                       $response = array('flag' => "true", 'status_code' => '201'
                        , 'message' => htmlentities(json_decode($json), ENT_COMPAT, 'UTF-8')
                    );

                    }
                    else{

                    $response = array('flag' => "true", 'status_code' => '201'
                        , 'message' => "A reset password link in send to your email id.",
                    );

                    }

                    $user->password_link_status = '1';
                    $user->save();

                    //self::sendMail($email);
                    self::sendFogotPasswordMail($email);

                } else {

                    $response = array('flag' => "false", 'status_code' => '1001', 'message' => "Social User Type");

                }

            } else {

                if($request->language_code=="en"){

                   $response = array('flag' => "false", 'status_code' => '1002', 'message' => "User not found");
                }
                elseif($request->language_code=="fr"){
                    $json = '"Utilisateur non trouvé "';
                  $response = array('flag' => "false", 'status_code' => '1002', 'message' => htmlentities(json_decode($json), ENT_COMPAT, 'UTF-8'));
                } 
                elseif($request->language_code=="de"){
                     $json = '"Teilnehmer nicht gefunden "';
                    $response = array('flag' => "false", 'status_code' => '1002', 'message' => htmlentities(json_decode($json), ENT_COMPAT, 'UTF-8'));
                }
                else{
                   $response = array('flag' => "false", 'status_code' => '1002', 'message' => "User not found");
                }
            }

        } else {

            $response = array('flag' => "false", 'status_code' => '1000', 'message' => "Please Enter Email Id");

        }

        return json_encode($response);

    }
/*
public function updateProfilePicByUserId(request $request)
{

if (self::checkValidation($request)) {
# code...
$userId = $request->input('user_id');

$file_data = $request->input('image');
$file_name = 'profile_pic_' . $userId . '.png';

$user = User::find($userId);

if ($user) {

@list($type, $file_data) = explode(';', $file_data);

@list(, $file_data) = explode(',', $file_data);

$baseurl = url("images/");

if ($file_data != "") {

\Storage::disk('public')->put($file_name, base64_decode($file_data));

$user->profile_pic = $file_name;

if ($user->save()) {

$response = array('flag' => "true",
'base_url' => $baseurl,
'message' => "File Uploaded Successfully",
'image' => $file_name);
} else {

$response = array('flag' => "false",

'message' => "Fail to upload file");

}

} else {
$response = array(
'flag' => "false",

'message' => "Fail to update DB",
);

}

}

echo json_encode($response);

}

}
 */
    public function updateProfilePicByUserId(request $request)
    {
        if (self::checkValidationProfilePic($request)) {

            $userId = $request->input('user_id');

            $file_body = $request->input('image');

            $user = User::find($userId);

            if ($user) {

                $file = base64_decode($file_body);
                //$folderName = 'public/images/';
                $safeName = 'profile_pic_' . $userId . '.' . 'png';
                //$destinationPath = public_path() . $folderName;
                $success = file_put_contents(public_path() . '/images/' . $safeName, $file);

                if ($success) {

                    $user->profile_pic = $safeName;

                    if ($user->save()) {

                        $response = array('flag' => "true"
                            , 'status_code' => '201'
                            , 'message' => "Profile Picture Updated Successfully"
                            , 'profile_pic' => $safeName);
                    } else {

                        $response = array('flag' => "false"
                            , 'status_code' => '1001'
                            , 'message' => "Fail to update profile picture");

                    }
                } else {
                    $response = array(
                        'flag' => "false"
                        , 'status_code' => '1002'
                        , 'message' => "Fail to save image");

                }

            } else {
                $response = array(
                    'flag' => "false"
                    , 'status_code' => '1003'
                    , 'message' => "User not found");

            }

            echo json_encode($response);
        }
    }

    private function checkValidationProfilePic(request $request)
    {

        $check = true;

        $errorList = array();

        $file_body = $request->input('image');

        $userId = $request->input('user_id');

        //echo 'File body from iOS: ' . $file_body;

        if (!isset($userId)) {
            array_push($errorList, "User Id missing.");
        }

        if (!isset($file_body)) {
            array_push($errorList, "Please add a image.");
        }

        if (count($errorList) > 0) {

            $check = false;

            $response = array('flag' => "false", 'status_code' => '1000', 'message' => $errorList[0]);

            echo json_encode($response);

        }

        return $check;

    }

    public function checkValidationUpdateProfile(request $request)
    {

        $check = true;

        $errorList = array();

        $userId = $request->input('user_id');

        $name = $request->input('name');

        $password = $request->input('password');

        if (!isset($userId)) {
            array_push($errorList, "User Id missing.");
        }

        if (isset($password)) {

            if (strlen($password) < 8) {

                array_push($errorList, "Password must be contain at least 8 characters");

            }

        }

        if (count($errorList) > 0) {

            $check = false;

            $response = array('flag' => "false", 'status_code' => '1000', 'message' => $errorList[0]);

            echo json_encode($response);

        }

        return $check;

    }

    public function updateNameAndPassword(request $request)
    {
        if (self::checkValidationUpdateProfile($request)) {

            $userId = $request->input('user_id');

            $name = $request->input('name');

            $password = $request->input('password');

            $user = User::find($userId);

            if ($user) {

                if (isset($name)) {
                    $user->name = $name;
                }

                if (isset($password)) {
                    $user->password = Hash::make($password);
                }

                if ($user->save()) {

                    $response = array('flag' => "true"
                        , 'status_code' => '201'
                        , 'message' => "Profile Updated Successfully");
                } else {

                    $response = array('flag' => "false"
                        , 'status_code' => '1001'
                        , 'message' => "Fail to update profile");

                }

            } else {
                $response = array(
                    'flag' => "false"
                    , 'status_code' => '1002'
                    , 'message' => "User not found");

            }

            echo json_encode($response);

        }
    }

}
