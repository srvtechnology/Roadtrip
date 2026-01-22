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

        $podcastList = Podcast::where('pod_active_status', '1')->orderBy('pod_id',"DESC")->get()->map(function ($item) {
            // Cast 'type' to integer
            $item->pod_active_status = (int) $item->pod_active_status;
            return $item;
        });

        // Add full image URL to each podcast
        foreach ($podcastList as $podcast) {
            $podcast->pod_img = url('/roadtrip/public/image_podcast/' . $podcast->pod_img);
        }


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

//     public function podcastList(Request $request)
// {
//     $userId = $request->input('user_id');
    
//     // Validate user if ID is provided
//     if (isset($userId) && !User::find($userId)) {
//         return response()->json([
//             'flag' => "false", 
//             'status_code' => '1001', 
//             'message' => "User not found"
//         ]);
//     }

//     // Get active podcasts
//     $podcasts = Podcast::where('pod_active_status', '1')
//         ->orderBy('pod_id', "DESC")
//         ->get();

//     // Format podcast data with proper image URLs
//     $formattedPodcasts = $podcasts->map(function ($podcast) {
//         return [
//             'pod_id' => $podcast->pod_id,
//             'pod_img' => url('/roadtrip/public/image_podcast/' . $podcast->pod_img),
//             'pod_title_en' => $podcast->pod_title_en,
//             'pod_audio_en' => $podcast->pod_audio_en,
//             'pod_description_en' => $podcast->pod_description_en,
//             'pod_title_fr' => $podcast->pod_title_fr,
//             'pod_audio_fr' => $podcast->pod_audio_fr,
//             'pod_description_fr' => $podcast->pod_description_fr,
//             'pod_title_de' => $podcast->pod_title_de,
//             'pod_audio_de' => $podcast->pod_audio_de,
//             'pod_description_de' => $podcast->pod_description_de,
//             'duration_in_min' => $podcast->duration_in_min,
//             'duration_in_min_fr' => $podcast->duration_in_min_fr,
//             'duration_in_min_de' => $podcast->duration_in_min_de,
//             'pod_active_status' => $podcast->pod_active_status,
//             'created_at' => $podcast->created_at,
//             'updated_at' => $podcast->updated_at
           
//             // Include other fields as needed
//         ];
//     });

//     // Prepare response
//     if ($formattedPodcasts->isEmpty()) {
//         return response()->json([
//             'flag' => "false",
//             'status_code' => '1003',
//             'message' => "No data found"
//         ]);
//     }

//     return response()->json([
//         'flag' => "true",
//         'status_code' => '201',
//         'message' => "success",
//         'body' => [
//             'podcast_list' => $formattedPodcasts
//         ]
//     ]);
// }

    public function guest_podcastList(request $request)
    {
        // $limit = 0;
        // $offset = 0;

        $podcastList = Podcast::where('pod_active_status', '1')->get()->map(function ($item) {
            // Cast 'type' to integer
            $item->pod_active_status = (int) $item->pod_active_status;
            return $item;
        });;

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
