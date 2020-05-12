<?php

namespace App\Http\Controllers;

use App\Application;
use App\User;
use Illuminate\Http\Request;

class ApplyController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view("apply");
    }

    public function create(Request $request)
    {
        if(count($request->user()->applications) >= 5)
        {

            return redirect("/home")->with("maxapplies", "U kan maximaal 5x sollicieren");
        }

        $request->validate([
            "functie" => "required",
            "motivatie" => "required",
            "ervaring" => "required",
            "waaromjij" => "required",
        ]);

        $app = new Application();
        $app->user_id = $request->user()->id;
        $app->functie = $request->get("functie");
        $app->motivatie = $request->get("motivatie");
        $app->ervaring = $request->get("ervaring");
        $app->waaromjij = $request->get("waaromjij");
        $app->save();

        return redirect("/home");

    }

    public function edit(Application $app)
    {
        $app->applystatus_id = \request("change");
        $app->staffopmerking = \request("staffopmerking");
        $app->save();
        return redirect(route("hk.applies"));
    }

    public function delete(Application $app)
    {
        $app->delete();
        return redirect(route("hk.applies"));
    }

}
