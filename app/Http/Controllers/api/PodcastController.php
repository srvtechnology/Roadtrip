<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Podcast;
use App\User;
use Illuminate\Http\Request;

class PodcastController extends Controller
{
    public function podcastList(request $request)
    {
        $userId = $request->input('user_id');

        $podcastList = Podcast::where('pod_active_status', '1')->orderBy('pod_id',"DESC")->get();

        $list['podcast_list'] = $podcastList;

        if (isset($userId)) {

            $isUserExist = User::find($userId);

            if ($isUserExist) {

                if ($podcastList) {

                    if (count($podcastList) > 0) {

                        $response = array('flag' => "true", 'status_code' => '201', 'message' => "success", 'body' => $list);

                    } else {

                        $response = array('flag' => "false", 'status_code' => '1003', 'message' => "No data found");
                    }

                } else {

                    $response = array('flag' => "false", 'status_code' => '1003', 'message' => "No data found");

                }

            } else {
                $response = array('flag' => "false", 'status_code' => '1001', 'message' => "User not found");
            }

        } else {

            if (count($podcastList) > 0) {

                $response = array('flag' => "true", 'status_code' => '201', 'message' => "success", 'body' => $list);

            } else {

                $response = array('flag' => "false", 'status_code' => '1003', 'message' => "No data found");
            }
        }
        return json_encode($response);

    }

    public function guest_podcastList(request $request)
    {
        // $limit = 0;
        // $offset = 0;

        $podcastList = Podcast::where('pod_active_status', '1')->get();

        if ($podcastList) {

            if (count($podcastList) > 0) {

                $list['podcast_list'] = $podcastList;

                $response = array('flag' => "true", 'status_code' => '201', 'message' => "success", 'body' => $list);

            } else {

                $response = array('flag' => "false", 'status_code' => '1003', 'message' => "No data found");
            }

        } else {

            $response = array('flag' => "false", 'status_code' => '1003', 'message' => "No data found");

        }

        return json_encode($response);

    }
}
