<?php

namespace App\Http\Controllers;

use App\BanPlayer;
use Illuminate\Http\Request;

class BanController extends Controller
{
    public function delete(BanPlayer $ban)
    {
        $ban->delete();

        return redirect(route("hk.bans"));


    }


}
