<?php
/***********************************************/
# Company Name    :
# Author          : KB
# Created Date    :
# Controller Name : DashboardController
# Purpose         : Dashboard features, user pa
/***********************************************/

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Package;
use App\Podcast;
use App\Route;
use Illuminate\Http\Request;
use Validator;

class PackageController extends Controller
{
    public $listUrl = 'list_package';
    public function index()
    {
        $package['user_package'] = Package::where('is_delete', 0)->orderBy("id", "DESC")->get();
        // $route['user_route']=Route::all();

        foreach ($package['user_package'] as $packages) {
            // echo json_encode($packages->route_ids);
            $ids = explode(",", $packages->route_ids);
            $packages['pack'] = Route::select('route_id', 'route_title_en')->whereIn('route_id', $ids)->get();
            //  echo json_encode($pack);
        }
        //    echo json_encode($package);
        //   return view('list_package',$package);
        foreach ($package['user_package'] as $podcast_package) {
            $idss = explode(",", $podcast_package->podcast_ids);
            $podcast_package['packs'] = Podcast::select('pod_id', 'pod_title_en')->whereIn('pod_id', $idss)->get();

        }
        //    echo json_encode($package);
        return view('list_package', $package);

    }

    public function list_package_add()
    {
        $data['routes'] = Route::where('route_status', 1)->orderBy('route_id', "DESC")->get(['route_id', 'route_title_en']);

        $data['podcasts'] = Podcast::where('pod_active_status', 1)->orderBy('pod_id', "DESC")->get(['pod_id', 'pod_title_en']);

        return view('list_package_add', $data);
    }

    
    public function list_package_addNew($data)
    {
        $data['routes'] = Route::where('route_status', 1)->orderBy('route_id', "DESC")->get(['route_id', 'route_title_en']);

        $data['podcasts'] = Podcast::where('pod_active_status', 1)->orderBy('pod_id', "DESC")->get(['pod_id', 'pod_title_en']);

        return view('list_package_add', $data);
    }

    public function do_list_package_add(Request $request)
    {

        /*
        $request->validate([
        'package_image' => 'required|image|mimes:png,jpg,jpeg|max:200|dimensions:max_width=1152,max_height=384',
        'package_active_image' => 'required|image|mimes:png,jpg,jpeg|max:200|dimensions:max_width=650,max_height=327',
        ]);*/
        $validateFields = array('package_image' => 'required|image|mimes:png,jpg,jpeg|max:200|dimensions:max_width=1152,max_height=384',
            'package_active_image' => 'required|image|mimes:png,jpg,jpeg|max:200|dimensions:max_width=650,max_height=327',
             'package_name' => 'required|unique:packages,package_name',  
        );
     

       $this->validate($request, $validateFields);


        
   

        $selectedRoutes = $request->get('routes');
        $route_ids = '';
        foreach ($selectedRoutes as $item) {

            $route_ids .= $item . ',';
        }

        $selectedPods = $request->get('podcasts');
        $podcast_ids = '';
        foreach ($selectedPods as $item) {

            $podcast_ids .= $item . ',';
        }

        $packageImage = $request->file('package_image');

        if ($packageImage) {

            $file_extension = $packageImage->getClientOriginalExtension();

            $saveNamePackageImage = 'box_package_' . time() . '.' . $file_extension;

            $packageImage->move(public_path() . '/package_images/', $saveNamePackageImage);

        }
        //=========================================================

        $activeImage = $request->file('package_active_image');

        if ($activeImage) {

            $file_extension = $activeImage->getClientOriginalExtension();

            $saveNameActiveImage = 'active_package_' . time() . '.' . $file_extension;

            $activeImage->move(public_path() . '/package_images/', $saveNameActiveImage);

        }

        //==========================================================

        try {

            $model = new Package;
            $model->package_id = 1;
            $model->package_name = $request->get('package_name');
            $model->package_price = $request->get('package_price');
            $model->route_ids = $route_ids;
            $model->podcast_ids = $podcast_ids;
            $model->sequence = $request->get('sequence');

            $model->package_image = $saveNamePackageImage;
            $model->active_image = $saveNameActiveImage;

            echo json_encode($model);
            $model->save();
            $model = Package::find($model->id);
            $model->package_id = $model->id;
            $model->save();
            return \Redirect::Route($this->listUrl)->with('success', 'Record updated successfully');

        } catch (Exception $e) {
            throw new \App\Exceptions\AdminException($e->getMessage());
        }
    }
    public function list_package_edit($id)
    {

        $package = Package::where('package_id', $id)->first();

        $data['id'] = $id;
        $data['package'] = $package;
        $data['routes'] = Route::where('route_status', 1)->orderBy('route_id', "DESC")->get(['route_id', 'route_title_en']);
        $data['existing_route_ids'] = explode(",", $package->route_ids);

        $data['podcasts'] = Podcast::where('pod_active_status', 1)->orderBy('pod_id', "DESC")->get(['pod_id', 'pod_title_en']);
        $data['existing_pod_ids'] = explode(",", $package->podcast_ids);

        return view('list_package_edit', $data);
    }

    public function do_list_package_edit(Request $request, $id)
    {

        // 'package_name' => [ Rule::unique('packages')->ignore($id)]
        $validateFields = array('package_image' => 'image|mimes:png,jpg,jpeg|max:200|dimensions:max_width=1152,max_height=384',
        'package_active_image' => 'image|mimes:png,jpg,jpeg|max:200|dimensions:max_width=650,max_height=327',
         //'package_name' => 'unique:packages,package_name,'.$id,  
    );
 

           $this->validate($request, $validateFields);

    $validateFields = array(
         'package_name' => 'unique:packages,package_name,'.$id,  
    );
    $this->validate($request, $validateFields);
        //echo 'I am in do_list_package_edit';

       /*  $validateFields = array('package_image' => 'image|mimes:png,jpg,jpeg|max:200|dimensions:max_width=1152,max_height=384',
            'package_active_image' => 'image|mimes:png,jpg,jpeg|max:200|dimensions:max_width=650,max_height=327');

        $this->validate($request, $validateFields);*/

        $selectedRoutes = $request->get('routes');
        $route_ids = '';
        foreach ($selectedRoutes as $item) {

            $route_ids .= $item . ',';
        }

        $selectedPods = $request->get('podcasts');
        $podcast_ids = '';
        foreach ($selectedPods as $item) {

            $podcast_ids .= $item . ',';
        }




if ($request->hasFile('package_image')) {
                 $packageImage = $request->file('package_image');
 $file_extension = $packageImage->getClientOriginalExtension();
            $saveNamePackageImage = 'box_package_' . time() . '.' . $file_extension;
            $packageImage->move(public_path() . '/package_images/', $saveNamePackageImage);
            }    

        //=========================================================


if ($request->hasFile('package_active_image')) {
                $activeImage = $request->file('package_active_image');
 $file_extension = $activeImage->getClientOriginalExtension();
            $saveNameActiveImage = 'active_package_' . time() . '.' . $file_extension;
            $activeImage->move(public_path() . '/package_images/', $saveNameActiveImage);
            }

        //==========================================================

        try {

            $model = Package::find($id);
            
            $model->package_name = $request->get('package_name');
            $model->package_price = $request->get('package_price');
            $model->route_ids = $route_ids;
            $model->podcast_ids = $podcast_ids;
            $model->sequence = $request->get('sequence');

            if ($request->hasFile('package_image')) {
                $model->package_image = $saveNamePackageImage;
            }
           
            if ($request->hasFile('package_active_image')) {
               $model->active_image = $saveNameActiveImage;
            }
            echo json_encode($model);
            $model->save();
          
           return \Redirect::Route($this->listUrl)->with('success', 'Record updated successfully');

        } catch (Exception $e) {
            throw new \App\Exceptions\AdminException($e->getMessage());
        }

    }

    public function deletePackage($id)
    {
        $model = Package::find($id);
        $model->is_delete = 1;
        $model->save();

        return \Redirect::Route($this->listUrl)->with('success', 'Record Deleted successfully');

    }
    // public function list_package_edit($package_id)
    // {
    //     $get_package_details=Package::where('package_id', base64_decode($package_id))->get();
    //     return view('list_package_edit',["package_details"=>$get_package_details]);

    // }
    // public function list_package_edit($id)
    // {
    //     $package = Package::find($id);
    //     return view('list_package_edit', compact('package'));
    // }

    // public function do_list_package_edit(Request $request)
    // {

    //    // echo json_encode($request->all());
    //    $model = Package::find($request->package_id);

    //     $model->package_name = $request->packages_name;
    //     if ($model->save()) {

    //         return redirect()->route('list_package')->with('success', 'Successfully Updated!');
    //     } else {

    //         return redirect()->back()->with('error', 'try again');

    //     }

    // }

    /*public function addDailyRouteMap()
{

return view('add_dailyroute_map');

}*/

}
