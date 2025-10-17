<?php
/***********************************************/
# Company Name    :                             
# Author          : KB                            
# Created Date    :                               
# Controller Name : DashboardController               
# Purpose         : Dashboard features, user pa             
/***********************************************/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use \Validator;
use \Hash;
use \Redirect;
use App\User;
use App\AdminUser;
use Exception;
use GlobalVars;
use App\Route;

class DashboardController extends Controller
{
    public function index()
    {
      
            $user_list=User::where('user_active_status','1')->get();
            $inactive_user_list=User::where('user_active_status','0')->get();
            if(!empty($user_list)){
                
                $user_list['count']=count($user_list);

                $user_list['inactive_count']=count($inactive_user_list);
                

            }
            $getroute_list = Route::where('route_status', '1')->get();
            if(!empty($getroute_list)){
                $route_list['count']=count($getroute_list);
            }

            return view('index', ['user_list' => $user_list,'route_list'=>$route_list]);

              
    }



}
