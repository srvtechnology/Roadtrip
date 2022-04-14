<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Package;
use App\Payment;
use App\User;
use App\UserPackageInfo;
use Illuminate\Http\Request;
use App\UserRoadTrip;
use DB;
use Validator;
use App\FrenchPackages;
use App\GermanPackages;
//use App\UserPackageInfo;
use App\GermanUserPackageInfo;
use App\FrenchUserPackageInfo;

use App\FrenchPayment;
use App\GermanPayment;


class PaymentController extends Controller
{
    public function addPayment(request $request)
    {

         $validator = Validator::make($request->all(), [
                'language_code'  => 'required', 
                //'user_id'        => 'required',            
        ]); 

        if ($validator->fails()) {  
        return response()->json(['error'=>$validator->errors()], 401); 
        }

        $userId = $request->input('user_id');
        $packageID = $request->input('package_id');
        $paymentAmount = $request->input('payment_amount');
        $platform = $request->input('platform');
        $gatewayReponse = $request->input('gateway_response');

        if (isset($userId) && isset($packageID) && isset($paymentAmount) && isset($platform) && isset($gatewayReponse)) {

            $isUserExist = User::find($userId);

            if ($isUserExist) {
                $package = Package::where('package_id', $packageID)->first();
                
                //frent table insert and german table insert
                @$frenchpackage = FrenchPackages::where('package_id', $packageID)->first();
                @$germanpackage = GermanPackages::where('package_id', $packageID)->first();

                $model = new Payment;
                $model->user_id = $userId;
                $model->package_id = $packageID;
                $model->payment_amount = $paymentAmount;
                $model->platform = $platform;
                $model->package_details_on_purchase_time = $package;
                $model->gateway_response = json_encode($gatewayReponse);
                $model->save();
                
                //insert payment details in french payment table
                $model_fr = new FrenchPayment;
                $model_fr->user_id = $userId;
                $model_fr->package_id = $packageID;
                $model_fr->payment_amount = $paymentAmount;
                $model_fr->platform = $platform;
                $model_fr->package_details_on_purchase_time = $frenchpackage;
                $model_fr->gateway_response = json_encode($gatewayReponse);
                $model_fr->save();
                
                 //insert payment details in german payment table
                $model_gr = new GermanPayment;
                $model_gr->user_id = $userId;
                $model_gr->package_id = $packageID;
                $model_gr->payment_amount = $paymentAmount;
                $model_gr->platform = $platform;
                $model_gr->package_details_on_purchase_time = $germanpackage;
                $model_gr->gateway_response = json_encode($gatewayReponse);
                $model_gr->save();

                @$user_info_ = UserPackageInfo::updateOrCreate(['user_id' => $userId]
                    , ['package_details_on_purchase_time' => $package]);

                //insert or update into french table and german table of package information
                @$user_info_fr = FrenchUserPackageInfo::updateOrCreate(['user_id' => $userId]
                    , ['package_details_on_purchase_time' => @$frenchpackage]);
                @$user_info_de = GermanUserPackageInfo::updateOrCreate(['user_id' => $userId]
                    , ['package_details_on_purchase_time' => @$germanpackage]);

                if($request->language_code=="en"){
                     $response = array('flag' => "true", 'status_code' => '201', 'message' => "success", 'body' => $model);

                }elseif ($request->language_code=="fr") {
                     $response = array('flag' => "true", 'status_code' => '201', 'message' => "success", 'body' => $model_fr);
                   
                }elseif ($request->language_code=="de") {
                     $response = array('flag' => "true", 'status_code' => '201', 'message' => "success", 'body' => $model_gr);
                   
                }else{
                     $response = array('flag' => "false", 'status_code' => '1001', 'message' => "Language code mismatch",'body' => $model);
                     return json_encode($response);
                }

               

            } else {
                $response = array('flag' => "false", 'status_code' => '1001', 'message' => "User not found");
            }
        } else {
            $response = array('flag' => "false", 'status_code' => '1002', 'message' => "Missing Parameter(s)");

        }
        return json_encode($response);
    }











    public function getAllPackages(request $request)
    {

        $validator = Validator::make($request->all(), [
                'language_code'        => 'required',            
        ]); 

        if ($validator->fails()) {  
        return response()->json(['error'=>$validator->errors()], 401); 
        }

        if($request->language_code=="en"){

            $packages = Package::select('id', 'package_name', 'package_id'
                , 'package_price', 'package_image', 'max_poi_no', 'route_ids', 'podcast_ids'
                , 'max_podcast_no', 'sequence', 'is_delete')->where('is_delete', 0)->orderBy('sequence', "ASC")->get();

            $response = array('flag' => "true", 'status_code' => '201', 'body' => $packages);

            return json_encode($response);
        }
        elseif($request->language_code=="de"){

             $packages = GermanPackages::select('id', 'package_name', 'package_id'
                , 'package_price', 'package_image', 'max_poi_no', 'route_ids', 'podcast_ids'
                , 'max_podcast_no', 'sequence', 'is_delete')->where('is_delete', 0)->orderBy('sequence', "ASC")->get();

            $response = array('flag' => "true", 'status_code' => '201', 'body' => $packages);
            return json_encode($response);

        }
        elseif($request->language_code=="fr"){

             $packages = FrenchPackages::select('id', 'package_name', 'package_id'
                , 'package_price', 'package_image', 'max_poi_no', 'route_ids', 'podcast_ids'
                , 'max_podcast_no', 'sequence', 'is_delete')->where('is_delete', 0)->orderBy('sequence', "ASC")->get();

            $response = array('flag' => "true", 'status_code' => '201', 'body' => $packages);
            return json_encode($response);
            
        }else{

            $response = array('flag' => "false", 'status_code' => '201', 'body' => "error");
            return json_encode($response);

        }

    }







    public function getCurrentPackage(request $request)
    {

        $validator = Validator::make($request->all(), [
                'language_code'  => 'required', 
                'user_id'        => 'required',            
        ]); 

        if ($validator->fails()) {  
        return response()->json(['error'=>$validator->errors()], 401); 
        }


        $userId = $request->input('user_id');

        if (isset($userId)) {

            //check data according to language
            if($request->language_code=="en"){
            $package = UserPackageInfo::where('user_id', $userId)->first();
            }elseif($request->language_code=="de"){
              $package = GermanUserPackageInfo::where('user_id', $userId)->first();
            }elseif($request->language_code=="fr"){
                $package = FrenchUserPackageInfo::where('user_id', $userId)->first();
            }else{
                $response = array("flag" => false, "status_code" => 2, "message" => 'Language code not match');
                  return json_encode($response);
            }
             
            if ($package) {

                // $total_road_trip=explode(',',$package->route_ids);
                // dd($package->package_details_on_purchase_time['route_ids']);

                $package['package_details_on_purchase_time'] = $package->package_details_on_purchase_time;

                // $package['package_details_on_purchase_time']=json_decode($package->package_details_on_purchase_time);

                unset($package->created_at, $package->updated_at);

                $response = array("flag" => true, "status_code" => 201, "body" => $package, "message" => 'Data found');
            } else {
                $response = array("flag" => false, "status_code" => 1, "message" => 'This user does not have any active package');

            }

        } else {
            $response = array("flag" => false, "status_code" => 2, "message" => 'Missing Param');

        }

        return json_encode($response);
    }













    public function getMyOrders(request $request)
    {
         $validator = Validator::make($request->all(), [
                'language_code'  => 'required', 
                'user_id'        => 'required',            
        ]); 

        if ($validator->fails()) {  
        return response()->json(['error'=>$validator->errors()], 401); 
        }


        $userId = $request->input("user_id");

        if($request->language_code=="en"){
             $list = Payment::select('id', 'package_details_on_purchase_time'
            , \DB::raw('DATE_FORMAT(created_at, "%d/%m/%Y") as purchase_date'))
            ->where('user_id', $userId)->orderBy('id', "DESC")->get();
        }
        elseif ($request->language_code=="fr") {
             $list = FrenchPayment::select('id', 'package_details_on_purchase_time'
            , \DB::raw('DATE_FORMAT(created_at, "%d/%m/%Y") as purchase_date'))
            ->where('user_id', $userId)->orderBy('id', "DESC")->get();
        }
        elseif ($request->language_code=="de") {
             $list = GermanPayment::select('id', 'package_details_on_purchase_time'
            , \DB::raw('DATE_FORMAT(created_at, "%d/%m/%Y") as purchase_date'))
            ->where('user_id', $userId)->orderBy('id', "DESC")->get();
        }
         else{
              $response = array("flag" => false, "status_code" => 1, "message" => "Language code mismatch");
               return json_encode($response);
        }

       

        if (count($list) > 0) {
            $response = array("flag" => true, "status_code" => 201, "message" => "data found", "body" => $list);
        } else {
            $response = array("flag" => false, "status_code" => 1, "message" => "No data found");
        }

        return json_encode($response);
    }









    public function insert_data_to_user_road_trip(Request $request){

       $validator = Validator::make($request->all(), [
                'user_id'        => 'required',
            
        ]); 

        if ($validator->fails()) {  
        return response()->json(['error'=>$validator->errors()], 401); 
        }

        $userId = $request->input('user_id');
        $srch=DB::table('payments')->where('user_id',$userId)->get();  
        $c_route=0;
        $c_podcast=0;
        // $srch_package=DB::table('packages')->whereIn('id',$srch)->get();
        foreach($srch as $value)
        {
            $srch_package=DB::table('packages')->where('id',$value->package_id)->first();
            $routes=count(explode(',',$srch_package->route_ids))-1;
            $podcast=count(explode(',',$srch_package->podcast_ids))-1;
            $c_podcast= $c_podcast+$podcast;
            $c_route=$c_route+$routes;
            
        }    
         //dd($c_podcast,$c_route);
         //check wether all the roadtrip used or not and all the podcast used or not ..
         $srch_roadtrip_count=UserRoadTrip::where('user_id',$userId)->where('roadtrip_status','1')->count();
         $srch_podcast_count=UserRoadTrip::where('user_id',$userId)->where('podcast_status','1')->count();
        // dd( $srch_roadtrip_count,$srch_podcast_count);




//-------------------------------IF ONLY ROADTRIP COMES-------------------------------//--1
         if($request->roadtrip_status=="1" && $request->podcast_status=="0" ){

             $chk_already_roadtrip_id_exists=UserRoadTrip::where('user_id',$userId)->where('road_trip_id',$request->road_trip_id)->count();
            if($chk_already_roadtrip_id_exists<1){


               if($srch_roadtrip_count>=$c_route){   //+1 for one free 
                 return response()->json(['message'=>"Maximum number of road trip done","status"=>"error"], 401); 
               }else{

                $ins=new UserRoadTrip;
                $ins->road_trip_id=@$request->road_trip_id;
                $ins->roadtrip_status = "1";
                $ins->podcast_id = "0";
                $ins->podcast_status = "0";
                $ins->user_id = $userId;
                $ins->save();
                 return response()->json(['message'=>"Roadtrip inserted","status"=>"success"], 401); 
               }
           }
           else{
            return response()->json(['message'=>"this id already used","status"=>"error"], 401); 
           }

         }






//-------------------------------IF ONLY PODCAST COMES-------------------------------//--2
         elseif($request->roadtrip_status=="0" && $request->podcast_status=="1" ){

             $chk_already_podcast_id_exists=UserRoadTrip::where('user_id',$userId)->where('podcast_id',$request->podcast_id)->count();
            if($chk_already_podcast_id_exists<1){
          
               if($srch_podcast_count>=$c_podcast){   //+1 for one free
                 return response()->json(['message'=>"Maximum number of podcast done","status"=>"error"], 401); 
               }else{

                $ins=new UserRoadTrip;
                $ins->road_trip_id="0";
                $ins->roadtrip_status = "0";
                $ins->podcast_id = @$request->podcast_id;
                $ins->podcast_status = "1";
                $ins->user_id = $userId;
                $ins->save();
                 return response()->json(['message'=>"Podcast inserted","status"=>"success"], 401); 
               }
           }
           else{
             return response()->json(['message'=>"this id already used","status"=>"error"], 401); 
           }

         }






//-------------------------------IF BOTH COMES----------------------------------------//--3

        elseif($request->roadtrip_status=="1" && $request->podcast_status=="1" ){
          
           if($srch_podcast_count>=$c_podcast+1){   //+1 for one free
             return response()->json(['message'=>"Maximum number of podcast done","status"=>"error"], 401); 
           }
           elseif($srch_roadtrip_count>=$c_route+1){   //+1 for one free
             return response()->json(['message'=>"Maximum number of road trip done","status"=>"error"], 401); 
           }

           else{

            $ins=new UserRoadTrip;
            $ins->road_trip_id=@$request->road_trip_id;
            $ins->roadtrip_status = "1";
            $ins->podcast_id = @$request->podcast_id;
            $ins->podcast_status = "1";
            $ins->user_id = $userId;
            $ins->save();
             return response()->json(['message'=>"Podcast and roadtrip inserted","status"=>"success"], 401); 
           }

         }



         else{    //---4
              return response()->json(['message'=>"Something is wrong","status"=>"error"], 401); 
         }

    }
}
