<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Podcast;
use App\Poi;
use App\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use \Illuminate\Http\Response;

class RouteController extends Controller
{
    //
    public function add_image(Request $request)
    {

        try {

            if ($request->from == "add_poi") {
                $file = $request->file('image');
                $fileName = time() . mt_rand() . '.' . $file->getClientOriginalExtension();

                //$rules = array('image' => 'nullable|file|dimensions:ratio=16/9|max:5120');
                $rules = array('image' => 'nullable|image|max:5120');
                $validator = Validator::make(Input::all(), $rules);

                if ($validator->fails()) {
                    $error = $validator->getMessageBag()->toArray();
                    $show_error = $error['image'];
                    // return redirect()->back()->with('error', $error['image'][0]);

                    return Response()->json(["flag" => 'false', "image" => $error['image'][0]]);
                } else {
                    $destinationPath = public_path('image_route');

                    $file->move($destinationPath, $fileName);

                    return Response()->json(["flag" => 'true', "image" => $fileName], Response::HTTP_OK);

                }

            } elseif ($request->from == "add_pod") {

                $file = $request->file('image');
                $fileName = time() . mt_rand() . '.' . $file->getClientOriginalExtension();

                $rules = array('image' => 'nullable|image|max:5120');
                $validator = Validator::make(Input::all(), $rules);

                if ($validator->fails()) {
                    $error = $validator->getMessageBag()->toArray();
                    $show_error = $error['image'];
                    // return redirect()->back()->with('error', $error['image'][0]);

                    return Response()->json(["flag" => 'false', "image" => $error['image'][0]]);
                } else {
                    $destinationPath = public_path('image_podcast');

                    $file->move($destinationPath, $fileName);

                    return Response()->json(["flag" => 'true', "image" => $fileName], Response::HTTP_OK);

                }

            } else {

                $file = $request->file('image');

                $fileName = time() . mt_rand() . '.' . $file->getClientOriginalExtension();

                $rules = array('image' => 'nullable|image|max:5120');
                $validator = Validator::make(Input::all(), $rules);

                if ($validator->fails()) {
                    $error = $validator->getMessageBag()->toArray();
                    $show_error = $error['image'];
                    // return redirect()->back()->with('error', $error['image'][0]);

                    return Response()->json(["flag" => 'false', "image" => $error['image'][0]]);
                } else {
                    $destinationPath = public_path('image_route');

                    $file->move($destinationPath, $fileName);

                    return Response()->json(["flag" => 'true', "image" => $fileName], Response::HTTP_OK);

                }
            }

        } catch (Exception $e) {
            throw new \App\Exceptions\AdminException($e->getMessage());
        }
    }

    public function add_audio(Request $request)
    {

        try {
             if ($request->from == "add_poi") {

                //  $file = $request->file('audio');

                //  $fileName = time() . mt_rand() . '.' . $file->getClientOriginalExtension();
                //  $rules = array('audio' => 'nullable|mimes:m4a,mp4');
                //  $validator = Validator::make(Input::all(), $rules);

                // if ($validator->fails()) {
                //     $error = $validator->getMessageBag()->toArray();
                //     $show_error = $error['audio'];
                //     return Response()->json(["flag" => 'false', 'audio' => 'Audio must be .m4a']);
                // } else {
                //     $destinationPath = public_path('audio_route');

                //     $file->move($destinationPath, $fileName);

                //     return Response()->json(["flag" => 'true', "audio" => $fileName], Response::HTTP_OK);

                // }


                $file = $request->file('audio');
                $file_extension = $file->getClientOriginalExtension();
                if ($file_extension == "m4a") {
                    # code...
                    
                

                $fileName = time() . mt_rand() . '.' . $file->getClientOriginalExtension();
                $rules = array('audio' => 'file');
                $validator = Validator::make(Input::all(), $rules);

                if ($validator->fails()) {
                    $error = $validator->getMessageBag()->toArray();
                    $show_error = $error['audio'];
                    return Response()->json(["flag" => 'false', 'audio' => 'Audio must be .m4a',"file_extension"=>$file_extension]);
                } else {
                    $destinationPath = public_path('audio_route');

                    $file->move($destinationPath, $fileName);

                    return Response()->json(["flag" => 'true', "audio" => $fileName,"file_extension"=>$file_extension], Response::HTTP_OK);

                }
              }else{
                return Response()->json(["flag" => 'false', 'audio' => 'Audio must be .m4a',"file_extension"=>$file_extension]);
              }

             } 
             elseif ($request->from == "add_pod") {
                $file = $request->file('audio');
                $fileName = time() . mt_rand() . '.' . $file->getClientOriginalExtension();
                 $rules = array('audio' => 'nullable|mimetypes:audio/x-m4a|max:5120');
                $validator = Validator::make(Input::all(), $rules);

                if ($validator->fails()) {
                    $error = $validator->getMessageBag()->toArray();
                    $show_error = $error['audio'];
                  return Response()->json(["flag" => 'false', 'audio' => $error['audio'][0]]);
                    
                } else {
                    $destinationPath = public_path('audio_podcast');

                    $file->move($destinationPath, $fileName);

                    return Response()->json(["flag" => 'true', "audio" => $fileName], Response::HTTP_OK);

                }

            } else {
                $file = $request->file('audio');
                $file_extension = $file->getClientOriginalExtension();
                if ($file_extension == "m4a") {
                    # code...
                    
                

                $fileName = time() . mt_rand() . '.' . $file->getClientOriginalExtension();
                $rules = array('audio' => 'nullable|file');
                $validator = Validator::make(Input::all(), $rules);

                if ($validator->fails()) {
                    $error = $validator->getMessageBag()->toArray();
                    $show_error = $error['audio'];
                    return Response()->json(["flag" => 'false', 'audio' => 'Audio must be .m4a',"file_extension"=>$file_extension]);
                } else {
                    $destinationPath = public_path('audio_route');

                    $file->move($destinationPath, $fileName);

                    return Response()->json(["flag" => 'true', "audio" => $fileName,"file_extension"=>$file_extension], Response::HTTP_OK);

                }
              }else{
                return Response()->json(["flag" => 'false', 'audio' => 'Audio must be .m4a',"file_extension"=>$file_extension]);
              }

            }

        } catch (Exception $e) {
            throw new \App\Exceptions\AdminException($e->getMessage());
        }
   }

    public function daily_route_list(Request $request)
    {
        $get_list = Route::where('route_status', '1')->orderBy('route_id','DESC')->get();
        // echo json_encode($get_list);
        return view('daily_route_list', ["route_list" => $get_list]);
    }

    public function add_daily_route(Request $request)
    {
        return view('add_dailyroute');
    }

    public function do_add_daily_route(Request $request)
    {
//         echo json_encode($request->all());
// return;
// {"_token":"HmuId3iTRHvtxE2WaIx252NJLzsBMVXVY93rcUaY","image_hidden1":"16151442431707402491.png","image_hidden2":"16151442471303859215.png","audio_hidden1":"16151442551322616119.m4a","audio_hidden2":"1615144275282024516.m4a","audio_hidden3":"16151442921455599196.m4a","en_fileAudio":"audio.m4a","en_title":"Test title en","en_type":"0","en_des":"en test desc","fr_fileAudio":"audio.m4a","fn_title":"fr test title","fn_type":"1","fn_des":"test fr desc","de_fileAudio":"audio.m4a","de_title":"de test title","de_type":"0","de_des":"test de desc"}
        
        $model                       = new Route;
        $model->route_type           = $request->trip_type_hidden;
        $model->route_top_banner_img = $request->image_hidden1;
        $model->route_map_banner_img = $request->image_hidden2;

        $model->route_audio_en       = $request->audio_hidden1;
        $model->route_title_en       = $request->en_title;
        $model->route_description_en = $request->en_des;
       

        $model->route_audio_fr       = $request->audio_hidden2;
        $model->route_title_fr       = $request->fn_title;
        $model->route_description_fr = $request->fn_des;
       
        $model->route_audio_de       = $request->audio_hidden3;
        $model->route_title_de       = $request->de_title;
        $model->route_description_de = $request->de_des;
      
        if ($model->save()) {

            return redirect()->route('daily_route_list')->with('success', 'Successfully Added!');
        } else {

            return redirect()->back()->with('error', 'try again');

        }

    }

    public function view_point_of_interest(Request $request)
    {
        // $decoderoute_id=base64_decode($route_id);
        // echo json_encode($request->all());

        // return;
        try {
        $get_route_details = Route::where('route_id', $request->route_id)->where('route_status', '1')->get();
        $get_poi = Poi::where('route_id', $request->route_id)->where('poi_status', '1')->orderBy('poi_id', 'DESC')->get();

        return view('view_pointofinterest', ["route_details" => $get_route_details, "poi_list" => $get_poi]);
        } catch (Exception $e) {
            throw new \App\Exceptions\AdminException($e->getMessage());
        }

    }

    public function add_point_of_interest(Request $request)
    {

        // echo json_encode($request->all());

        return view('add_pointofinterest', ["route_id" => $request->route_id]);

    }

    public function do_add_point_of_interest(Request $request)
    {

        // echo json_encode($request->all());

        // {"_token":"c1MmlLp2ox2mcRB5s5TCV6VYG5clYDPDzECLdjYR","image_hidden1":"1615196927238127454.jpg","image_hidden2":"16151969302142857101.jpg","image_hidden3":"16151969331105942715.jpg","image_hidden4":"16151969361753606709.jpg","audio_hidden1":"1615196942986013047.m4a","audio_hidden2":"1615196950805621393.m4a","audio_hidden3":"1615196961815305373.m4a","audio_hidden4":null,"route_id":"4","en_place_name":"tbtybtb","en_fileAudio":"audio.m4a","en_place_des":"tbrbrtb","fr_place_name":"tbrybtyb","fr_fileAudio":"audio.m4a","fr_place_des":"fvfvgbgbhbh","de_place_name":"wwwwwwwwwwwwwwwwttyttuuy","de_fileAudio":"audio.m4a","de_place_des":"hhnyumyumn"}

        $model = new Poi;
        $model->route_id = $request->route_id;
        $model->poi_img_1 = $request->image_hidden1;
        $model->poi_img_2 = $request->image_hidden2;
        $model->poi_img_3 = $request->image_hidden3;
        $model->poi_img_4 = $request->image_hidden4;

        $model->poi_img_5 = $request->image_hidden5;
        $model->poi_img_6 = $request->image_hidden6;
        $model->poi_img_7 = $request->image_hidden7;
        $model->poi_img_8 = $request->image_hidden8;
        $model->poi_img_9 = $request->image_hidden9;
        $model->poi_img_10 = $request->image_hidden10;

        $model->poi_name_en = $request->en_place_name;
        $model->poi_audio_en = $request->audio_hidden1;
        $model->poi_description_en = $request->en_place_des;
       
        $model->poi_name_fr = $request->fr_place_name;
        $model->poi_audio_fr = $request->audio_hidden2;
        $model->poi_description_fr = $request->fr_place_des;
        

        $model->poi_name_de = $request->de_place_name;
        $model->poi_audio_de = $request->audio_hidden3;
        $model->poi_description_de = $request->de_place_des;
        

        if ($model->save()) {

            return redirect()->route('view_point_of_interest', ["route_id" => $request->route_id])->with('success', 'Successfully Added!');
        } else {

            return redirect()->back()->with('error', 'try again');

        }

    }

    public function details_point_of_interest($language, $poi_id)
    {

        $get_poi_details = Poi::where('poi_id', base64_decode($poi_id))->where('poi_status', '1')->get();
        return view('details_pointofinterest', ["poi_details" => $get_poi_details, "language" => $language]);
    }

    public function podcast_list(Request $request)
    {   
        $get_podcast_list=Podcast::where('pod_active_status','1')->orderBy('pod_id', 'DESC')->get();
        return view('proadcast_list',["podcast_list"=>$get_podcast_list]);
    }

    public function add_podcast(Request $request)
    {

        return view('add_podcast');
    }


     public function do_add_podcast(Request $request)
     {      
            $en_fileAudio = $request->file('audio');
            if ($en_fileAudio) {

                if ($request->hasFile('audio')) {

                    $file = $request->file('audio');

                    $file_extension = $file->getClientOriginalExtension();

                    $saveNameBanner1 = 'audio_' . time() . '.' . $file_extension;

                    $file->move(public_path() . '/uploads/audio_route/', $saveNameBanner1);

                }

            }



        // echo json_encode($request->all());
        // return;
        // {"_token":"Y3vs4SLDIjs02LX7kYEL5zsqQstANeTVYMBqyi5C","image_hidden1":"1615209305312980037.png","audio_hidden1":"16152093111983081874.m4a","audio_hidden2":"16152093201309569718.m4a","audio_hidden3":"16152093282037649314.m4a","en_fileAudio":"audio.m4a","en_title":"dsdvsdvsdv en","en_des":"sdvsdv","fr_fileAudio":"audio.m4a","fr_title":"sdvsdvfr fr","fr_des":"davasdvdav","de_fileAudio":"audio.m4a","de_title":"sdvsdv de","de_des":"sdvsdvdsv"}

        $model = new Podcast;
        $model->pod_img = $request->image_hidden1;

        $model->pod_title_en = $request->en_title;
        $model->pod_audio_en = $request->audio_hidden1;
        $model->pod_description_en = $request->en_des;
        $model->duration_in_min = $request->en_dur;
        

        $model->pod_title_fr = $request->fr_title;
        $model->pod_audio_fr = $request->audio_hidden2;
        $model->pod_description_fr = $request->fr_des;
        $model->duration_in_min_fr = $request->fr_dur;


        $model->pod_title_de = $request->de_title;
        $model->pod_audio_de = $request->audio_hidden3;
        $model->pod_description_de = $request->de_des;
        $model->duration_in_min_de = $request->de_dur;

        if ($model->save()) {

            return redirect()->route('podcast_list')->with('success', 'Successfully Added!');
        } else {

            return redirect()->back()->with('error', 'try again');

        }

     }

    public function view_podcast($pod_id)
    {
        $get_podcast_details=Podcast::where('pod_id', base64_decode($pod_id))->where('pod_active_status', '1')->get();
        return view('view_podcast',["podcast_details"=>$get_podcast_details]);
        
    }

    public function edit_daily_route($route_id)
    {
        $get_route_details=Route::where('route_id', base64_decode($route_id))->get();
        return view('edit_dailyroute',["route_details"=>$get_route_details]);
        
    }

    public function do_edit_daily_route(Request $request)
    {

        $model                       = Route::find($request->route_id);
        $model->route_type           = $request->trip_type_hidden;
        $model->route_top_banner_img = $request->image_hidden1;
        $model->route_map_banner_img = $request->image_hidden2;

        $model->route_audio_en       = $request->audio_hidden1;
        $model->route_title_en       = $request->en_title;
        $model->route_description_en = $request->en_des;
       

        $model->route_audio_fr       = $request->audio_hidden2;
        $model->route_title_fr       = $request->fr_title;
        $model->route_description_fr = $request->fr_des;
       

        $model->route_audio_de       = $request->audio_hidden3;
        $model->route_title_de       = $request->de_title;
        $model->route_description_de = $request->de_des;

        if ($model->save()) {

            return redirect()->route('daily_route_list')->with('success', 'Successfully Updated!');
        } else {

            return redirect()->back()->with('error', 'try again');

        }
        
    }

    
    public function edit_point_of_interest($poi_id)
    {
        $get_poi_details=Poi::where('poi_id', base64_decode($poi_id))->get();
        return view('edit_pointofinterest',["poi_details"=>$get_poi_details]);
        
    }

    
    public function do_edit_point_of_interest(Request $request)
    {

        $model = Poi::find($request->poi_id);
        $model->route_id = $request->route_id;
        $model->poi_img_1 = $request->image_hidden1;
        $model->poi_img_2 = $request->image_hidden2;
        $model->poi_img_3 = $request->image_hidden3;
        $model->poi_img_4 = $request->image_hidden4;

        $model->poi_img_5 = $request->image_hidden5;
        $model->poi_img_6 = $request->image_hidden6;
        $model->poi_img_7 = $request->image_hidden7;
        $model->poi_img_8 = $request->image_hidden8;
        $model->poi_img_9 = $request->image_hidden9;
        $model->poi_img_10 = $request->image_hidden10;

        $model->poi_name_en = $request->en_place_name;
        $model->poi_audio_en = $request->audio_hidden1;
        $model->poi_description_en = $request->en_place_des;

        $model->poi_name_fr = $request->fr_place_name;
        $model->poi_audio_fr = $request->audio_hidden2;
        $model->poi_description_fr = $request->fr_place_des;

        $model->poi_name_de = $request->de_place_name;
        $model->poi_audio_de = $request->audio_hidden3;
        $model->poi_description_de = $request->de_place_des;

        if ($model->save()) {

            return redirect()->route('view_point_of_interest', ["route_id" => $request->route_id])->with('success', 'Successfully Updated!');
        } else {

            return redirect()->back()->with('error', 'try again');

        }
        
    }

    public function edit_podcast($pod_id)
    {
        $get_pod_details=Podcast::where('pod_id', base64_decode($pod_id))->get();
        return view('edit_podcast',["pod_details"=>$get_pod_details]);
        
    }


    public function do_edit_podcast(Request $request)
    {

        // echo json_encode($request->all());
        // return;
        // {"_token":"Y3vs4SLDIjs02LX7kYEL5zsqQstANeTVYMBqyi5C","image_hidden1":"1615209305312980037.png","audio_hidden1":"16152093111983081874.m4a","audio_hidden2":"16152093201309569718.m4a","audio_hidden3":"16152093282037649314.m4a","en_fileAudio":"audio.m4a","en_title":"dsdvsdvsdv en","en_des":"sdvsdv","fr_fileAudio":"audio.m4a","fr_title":"sdvsdvfr fr","fr_des":"davasdvdav","de_fileAudio":"audio.m4a","de_title":"sdvsdv de","de_des":"sdvsdvdsv"}

        $model = Podcast::find($request->pod_id);

         $model->pod_img = $request->image_hidden1;

        $model->pod_title_en = $request->en_title;
        $model->pod_audio_en = $request->audio_hidden1;
        $model->pod_description_en = $request->en_des;
        $model->duration_in_min = $request->en_dur;

        $model->pod_title_fr = $request->fr_title;
        $model->pod_audio_fr = $request->audio_hidden2;
        $model->pod_description_fr = $request->fr_des;
         $model->duration_in_min_fr = $request->fr_dur;


        $model->pod_title_de = $request->de_title;
        $model->pod_audio_de = $request->audio_hidden3;
        $model->pod_description_de = $request->de_des;
         $model->duration_in_min_de = $request->de_dur;

        if ($model->save()) {

            return redirect()->route('podcast_list')->with('success', 'Successfully Updated!');
        } else {

            return redirect()->back()->with('error', 'try again');

        }

    }

    public function all_type_delete(Request $request)
    {
        if ($request->del_from == "del_route_list") {
            $model = Route::find($request->route_id);
            $model->route_status='2';
            $model->save();
            return redirect()->route('daily_route_list')->with('success', 'Deleted Successfully!');
        }elseif ($request->del_from == "del_poi_list") {
            # code...
            $model = Poi::find($request->poi_id);
            $model->poi_status='2';
            $model->save();
            return redirect()->route('view_point_of_interest',['route_id'=>$request->route_id])->with('success', 'Deleted Successfully!');
            
        }elseif ($request->del_from == "del_podcast_list") {
            $model = Podcast::find($request->pod_id);
            $model->pod_active_status='2';
            $model->save();
            return redirect()->route('podcast_list')->with('success', 'Deleted Successfully!');
        }elseif ($request->del_from == "del_package_list") {
             $model = Package::find($package_id);
             $model->is_delete = 1;
             $model->save();
             return redirect()->route('list_package')->with('success', 'Deleted Successfully!');
        } else{
            return redirect()->back()->with('error', 'try again');
        }


    }
    
    public function all_type_delete_(Request $request)
    {

            if ($request->del_from == "del_route_list") {
                # code...
                $model = Route::find($request->route_id);

               if ($model->delete()) {

            return redirect()->route('daily_route_list')->with('success', 'Deleted Successfully!');
           
           } else {

            return redirect()->back()->with('error', 'try again');

        }

            }

            elseif ($request->del_from == "del_poi_list") {
                # code...
                $model = Poi::find($request->poi_id);

               if ($model->delete()) {

            return redirect()->route('view_point_of_interest',['route_id'=>$request->route_id])->with('success', 'Deleted Successfully!');
           
           } else {

            return redirect()->back()->with('error', 'try again');

        }


            }

            elseif ($request->del_from == "del_podcast_list") {
                $model = Podcast::find($request->pod_id);

               if ($model->delete()) {

            return redirect()->route('podcast_list')->with('success', 'Deleted Successfully!');
           
           } else {

            return redirect()->back()->with('error', 'try again');

        }

            } 

            elseif ($request->del_from == "del_package_list") {
                //$model = Podcast::find($request->package_id);
                $model = Package::find($package_id);
               if ($model->delete()) {

            return redirect()->route('package_list')->with('success', 'Deleted Successfully!');
           
           } else {

            return redirect()->back()->with('error', 'try again');

        }

            } 

            else{
                return redirect()->back()->with('error', 'try again');
            }

    }

    

}
