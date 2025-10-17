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

class HelecopterController extends Controller
{
    public function index()
    {
      
           

            return view('link_helecopter');

              
    }

    /*public function addDailyRouteMap()
    {
      
           

            return view('add_dailyroute_map');

              
    }*/





}
