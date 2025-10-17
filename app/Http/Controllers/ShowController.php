<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShowController extends Controller
{
    //
    public function daily_route_list(Request $request)
    {
    	return view('list_dailyroute');
    }

    public function add_daily_route(Request $request)
    {
    	return view('add_dailyroute');
    }

    public function view_daily_route(Request $request)
    {
    	return view('view_dailyroute');
    }

    public function details_pointofinterest(Request $request)
    {
    	return view('details_pointofinterest');
    }
       public function add_pointofinterest(Request $request)
    {
    	return view('add_pointofinterest');
    }

    public function view_podcast(Request $request)
    {
    	return view('view_podcast');
    }

    public function list_podcast(Request $request)
    {
    	return view('list_podcast');
    }
    public function add_podcast(Request $request)
    {
    	return view('add_podcast');
    }
   public function add_dailyroute_tab(Request $request)
    {
        return view('add_dailyroute_tab');
    }

}
