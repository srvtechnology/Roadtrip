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
use App\UserPackageInfo;
use App\Payment;
use App\Package;

class PaymentController extends Controller
{
    public function index()
    {
              $payment['user_payment']=Payment::orderBy('id', 'DESC')->get();
              // echo json_encode($payment);
              foreach($payment['user_payment'] as $payments)
              { 
                  // echo json_encode($packages->route_ids);
                   $ids=explode(",",$payments->user_id);
                   $payments['pay']=User::whereIn('user_id',$ids)->orderBy('user_id', 'DESC')->get();
                  
              }
              foreach($payment['user_payment']as $payment_package)
              {
                   $idss=explode(",",$payment_package->package_id);
             $payment_package['packs']=Package::whereIn('package_id',$idss)->orderBy('package_id', 'DESC')->get();
            
             }
               //echo json_encode($payment);
              return view('list_payment',$payment);

    }

 
    public function addDailyRouteMap()
    {

            return view('list_payment');             
    }



    public function all_type_delete(Request $request)
    {
        if ($request->del_from == "del_list_payment") {
            $model = Payment::find($request->id);

           if ($model->delete()) {

        return redirect()->route('list_payment')->with('success', 'Deleted Successfully!');
       
       } else {

        return redirect()->back()->with('error', 'try again');

      }

        }
    }

}
