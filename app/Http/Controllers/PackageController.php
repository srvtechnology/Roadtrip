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

use App\FrenchPackages;
use App\GermanPackages;
// //use App\UserPackageInfo;
// use App\GermanUserPackageInfo;
// use App\FrenchUserPackageInfo;

// use App\FrenchPayment;
// use App\GermanPayment;

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
       // dd($request->all());

        /*
        $request->validate([
        'package_image' => 'required|image|mimes:png,jpg,jpeg|max:200|dimensions:max_width=1152,max_height=384',
        'package_active_image' => 'required|image|mimes:png,jpg,jpeg|max:200|dimensions:max_width=650,max_height=327',
        ]);*/
        $validateFields = array('package_image' => 'required|image|mimes:png,jpg,jpeg|max:200|dimensions:max_width=1152,max_height=384',
            'package_active_image' => 'required|image|mimes:png,jpg,jpeg|max:200|dimensions:max_width=650,max_height=327',
            'package_name' => 'required', 
            'package_name_fr' => 'required', 
            'package_price_fr' => 'required', 
            'package_name_de' => 'required', 
            'package_price_de' => 'required',  
        );

        $srch_name=Package::where('package_name',$request->package_name)->where('is_delete','0')->first();
        if($srch_name){
            return back()->with('error','Package name already exists');
        }
     

       $this->validate($request, $validateFields);


        
   
        if($request->get('routes')){
        $selectedRoutes = $request->get('routes');
        $route_ids = '';
        foreach ($selectedRoutes as $item) {

            $route_ids .= $item . ',';
        }
        }else{
             $route_ids = '';
        }

        if($request->get('podcasts')){

        $selectedPods = $request->get('podcasts');
        $podcast_ids = '';
        foreach ($selectedPods as $item) {

            $podcast_ids .= $item . ',';
        }
        }else{
             $podcast_ids = '';
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


            //In English Table
            $model = new Package;
            $model->package_id = 1;
            $model->package_name = $request->get('package_name');
            $model->package_price = $request->get('package_price');
            $model->route_ids = @$route_ids;
            $model->podcast_ids = @$podcast_ids;
            $model->allowed_routes  = @$request->get('allowed_routes');
            $model->allowed_podcasts  = @$request->get('allowed_podcasts');
            $model->sequence = $request->get('sequence');

            $model->package_image = $saveNamePackageImage;
            $model->active_image = $saveNameActiveImage;

           // echo json_encode($model);
            $model->save();
            $model = Package::find($model->id);
            $model->package_id = $model->id;
            $model->save();


            //In French Table 3/30/22
             $model_fr_ins = new FrenchPackages;
            $model_fr_ins->package_id = 1;
            $model_fr_ins->package_name = $request->get('package_name_fr');
            $model_fr_ins->package_price = $request->get('package_price_fr');
            $model_fr_ins->route_ids = $route_ids;
            $model_fr_ins->podcast_ids = $podcast_ids;
            $model_fr_ins->sequence = $request->get('sequence');

            $model_fr_ins->package_image = $saveNamePackageImage;
            $model_fr_ins->active_image = $saveNameActiveImage;

            // echo json_encode($model_fr_ins);
            $model_fr_ins->save();
            $model_fr_ins = FrenchPackages::find($model_fr_ins->id);
            $model_fr_ins->package_id = $model_fr_ins->id;
            $model_fr_ins->save();


            //In German Table 3/30/22
             $model_de_ins = new GermanPackages;
            $model_de_ins->package_id = 1;
            $model_de_ins->package_name = $request->get('package_name_de');
            $model_de_ins->package_price = $request->get('package_price_de');
            $model_de_ins->route_ids = $route_ids;
            $model_de_ins->podcast_ids = $podcast_ids;
            $model_de_ins->sequence = $request->get('sequence');

            $model_de_ins->package_image = $saveNamePackageImage;
            $model_de_ins->active_image = $saveNameActiveImage;

            // echo json_encode($model_de_ins);
            $model_de_ins->save();
            $model_de_ins = GermanPackages::find($model_de_ins->id);
            $model_de_ins->package_id = $model_de_ins->id;
            $model_de_ins->save();


            return \Redirect::Route($this->listUrl)->with('success', 'Record uploaded successfully');

        } catch (Exception $e) {
            throw new \App\Exceptions\AdminException($e->getMessage());
        }
    }
    public function list_package_edit($id)
    {

        $package = Package::where('package_id', $id)->first();
        
        //  3/30/22
        $french_package = FrenchPackages::where('package_id', $id)->first();
        $german_package = GermanPackages::where('package_id', $id)->first();

        $data['id'] = $id;
        $data['package'] = $package;
        
        //  3/30/22
        $data['french_package'] = $french_package;
        $data['german_package'] = $german_package;

        $data['routes'] = Route::where('route_status', 1)->orderBy('route_id', "DESC")->get(['route_id', 'route_title_en']);
        $data['existing_route_ids'] = explode(",", $package->route_ids);

        $data['podcasts'] = Podcast::where('pod_active_status', 1)->orderBy('pod_id', "DESC")->get(['pod_id', 'pod_title_en']);
        $data['existing_pod_ids'] = explode(",", $package->podcast_ids);

        return view('list_package_edit', $data);
    }

    public function do_list_package_edit(Request $request, $id)
    {
       //dd($request->all());
        // 'package_name' => [ Rule::unique('packages')->ignore($id)]
        $validateFields = array('package_image' => 'image|mimes:png,jpg,jpeg|max:200|dimensions:max_width=1152,max_height=384',
        'package_active_image' => 'image|mimes:png,jpg,jpeg|max:200|dimensions:max_width=650,max_height=327',
        'package_name' => 'required', 
        'package_name_fr' => 'required', 
        'package_price_fr' => 'required', 
        'package_name_de' => 'required', 
        'package_price_de' => 'required',  
    );
 

           $this->validate($request, $validateFields);

    // $validateFields = array(
    //      'package_name' => 'unique:packages,package_name,'.$id,  
    // );
    // $this->validate($request, $validateFields);
        //echo 'I am in do_list_package_edit';

       /*  $validateFields = array('package_image' => 'image|mimes:png,jpg,jpeg|max:200|dimensions:max_width=1152,max_height=384',
            'package_active_image' => 'image|mimes:png,jpg,jpeg|max:200|dimensions:max_width=650,max_height=327');

        $this->validate($request, $validateFields);*/

        $srch_name=Package::where('package_name',$request->package_name)->where('is_delete','0')->where('id','!=',$id)->first();
        if($srch_name){
            return back()->with('error','Package name already exists');
        }


        if($request->get('routes')){
        $selectedRoutes = $request->get('routes');
        $route_ids = '';
        foreach ($selectedRoutes as $item) {

            $route_ids .= $item . ',';
        }
        }else{
             $route_ids = '';
        }


        if($request->get('podcasts')){
        $selectedPods = $request->get('podcasts');
        $podcast_ids = '';
        foreach ($selectedPods as $item) {

            $podcast_ids .= $item . ',';
        }
        }else{
            $podcast_ids = '';
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
           
           //For English Table update
            $model = Package::find($id);
            
            $model->package_name = $request->get('package_name');
            $model->package_price = $request->get('package_price');
            $model->route_ids = @$route_ids;
            $model->podcast_ids = @$podcast_ids;
            $model->allowed_routes  = @$request->get('allowed_routes');
            $model->allowed_podcasts  = @$request->get('allowed_podcasts');
            $model->sequence = $request->get('sequence');

            if ($request->hasFile('package_image')) {
                $model->package_image = $saveNamePackageImage;
            }
           
            if ($request->hasFile('package_active_image')) {
               $model->active_image = $saveNameActiveImage;
            }
            // echo json_encode($model);
            $model->save();




            //For French Table  update
            $model_fr_updt = FrenchPackages::find($id);
            
            $model_fr_updt->package_name = $request->get('package_name_fr');
            $model_fr_updt->package_price = $request->get('package_price_fr');
            $model_fr_updt->route_ids = $route_ids;
            $model_fr_updt->podcast_ids = $podcast_ids;
            $model_fr_updt->sequence = $request->get('sequence');

            if ($request->hasFile('package_image')) {
                $model_fr_updt->package_image = $saveNamePackageImage;
            }
           
            if ($request->hasFile('package_active_image')) {
               $model_fr_updt->active_image = $saveNameActiveImage;
            }
            // echo json_encode($model_fr_updt);
            $model_fr_updt->save();


            //For German Table  update
            $model_de_updt = GermanPackages::find($id);
            
            $model_de_updt->package_name = $request->get('package_name_de');
            $model_de_updt->package_price = $request->get('package_price_de');
            $model_de_updt->route_ids = $route_ids;
            $model_de_updt->podcast_ids = $podcast_ids;
            $model_de_updt->sequence = $request->get('sequence');

            if ($request->hasFile('package_image')) {
                $model_de_updt->package_image = $saveNamePackageImage;
            }
           
            if ($request->hasFile('package_active_image')) {
               $model_de_updt->active_image = $saveNameActiveImage;
            }
            // echo json_encode($model_de_updt);
            $model_de_updt->save();
          
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

         $model_fr = FrenchPackages::find($id);
        $model_fr->is_delete = 1;
        $model_fr->save();

         $model_de = GermanPackages::find($id);
        $model_de->is_delete = 1;
        $model_de->save();

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
