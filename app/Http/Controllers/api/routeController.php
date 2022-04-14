<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Poi;
use App\Route;
use App\User;
use Illuminate\Http\Request;

class routeController extends Controller
{

    public function getAllActiveRoutesAndPoi(request $request)
    {

        
        $userId = $request->input('user_id');

        if (isset($userId)) {
           
            $user = User::find($userId);

            if ($user) {

                if ($user->user_active_status == 1) {

                    self::routeList();

                } else {
                
                    self::returnFalse(1, 'Your Account is deactivated by admin');
                
                }

            } else {
           
                self::returnFalse(0, 'User Not found');
           
            }
        } else {
           
            self::routeList();

        }

    }

    public function routeList()
    {

        $selectionRoute = array(
            'route_id'
            , 'route_type as type'
            , 'route_top_banner_img as banner_image'
            , 'route_map_banner_img as map_image'
            , 'route_audio_en as audio_en'
            , 'route_audio_fr as audio_fr'
            , 'route_audio_de as audio_de'

            , 'route_title_en as title_en'
            , 'route_title_fr as title_fr'
            , 'route_title_de as title_de'

            , 'route_description_en as description_en'
            , 'route_description_fr as description_fr'
            , 'route_description_de as description_de');

        $routes = Route::where('route_status', 1)->orderby('created_at','DESC')->select($selectionRoute)->get();

        if (count($routes) > 0) {

            $activeRouteIds = array();

            for ($i = 0; $i < count($routes); $i++) {

                array_push($activeRouteIds, $routes[$i]->route_id);

            }

            $selectionPoi = array('poi_id', 'route_id'
                , 'poi_img_1 as image1'
                , 'poi_img_2 as image2'
                , 'poi_img_3 as image3'
                , 'poi_img_4 as image4'
                , 'poi_img_5 as image5'
                , 'poi_img_6 as image6'
                , 'poi_img_7 as image7'
                , 'poi_img_8 as image8'
                , 'poi_img_9 as image9'
                , 'poi_img_10 as image10'

                , 'poi_name_en as name_en'
                , 'poi_audio_en as audio_en'
                , 'poi_description_en as description_en'

                , 'poi_name_fr as name_fr'
                , 'poi_audio_fr as audio_fr'
                , 'poi_description_fr as description_fr'

                , 'poi_name_de as name_de'
                , 'poi_audio_de as audio_de'
                , 'poi_description_de as description_de');

            $poi = Poi::whereIn('route_id', $activeRouteIds)
                ->where('poi_status', 1)
                ->orderby('poi_id','DESC')
                ->select($selectionPoi)
                ->get();

            $body = array('route_list' => $routes, 'poi_list' => $poi);

            self::returnTrue(201, $body);
        } else {
            self::returnFalse(2, 'No Route Found');
        }
    }
    private function returnFalse($errorCode, $errorMessage)
    {
        $mArray = array('flag' => 'false', 'status_code' => $errorCode, 'message' => $errorMessage);

        echo json_encode($mArray);
    }

    private function returnTrue($status_code, $body)
    {

        $mArray = array('flag' => 'true', 'status_code' => $status_code, 'message' => 'success', 'body' => $body);

        echo json_encode($mArray);

    }
}
