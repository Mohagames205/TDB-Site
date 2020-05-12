<?php

namespace App\Http\Controllers;

use App\Application;
use App\Ban;
use App\BanPlayer;
use Illuminate\Http\Request;

class HouseKeepingController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view("housekeeping.index");
    }

    public function applies()
    {
        return view("housekeeping.applies", ["applications" => Application::all()->filter(function($application){ return $application->applystatus->id == 3; }), "processedapplies" => Application::all()->filter(function($application){ return $application->applystatus->id !== 3; })]);
    }

    public function bans()
    {
        return view("housekeeping.bans", ["bans" => BanPlayer::all()]);
    }


}
