<?php

namespace App\Http\Controllers;

use App\Application;
use App\Ban;
use App\BanPlayer;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class HouseKeepingController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $host = env("MCSERVER_HOST", "5.199.143.143");
        $port = env("MCSERVER_PORT", 19145);

        try {
                $onlinePlayers = self::getServerInfo($host, $port)["Players"];
        } catch (\Exception $e) {
            $onlinePlayers = "idk";
        }
        $bans = BanPlayer::getCount();

        return view("housekeeping.index", ["onlinePlayers" => $onlinePlayers, "bans" => $bans]);
    }

    public function applies()
    {
        return view("housekeeping.applies", ["applications" => Application::all()->filter(function($application){ return $application->applystatus->id == 3; }), "processedapplies" => Application::all()->filter(function($application){ return $application->applystatus->id !== 3; })]);
    }

    public function bans()
    {
        return view("housekeeping.bans", ["bans" => BanPlayer::all()]);
    }

    //TODO: create a server model!

    public static function getServerInfo(string $host, int $port, int $timeout = 4)
    {
        $socket = @fsockopen('udp://'.$host, $port, $errno, $errstr, $timeout);

        if($errno) {
            fclose($socket);
            throw new \Exception($errstr, $errno);
        }elseif($socket === false) {
            throw new \Exception($errstr, $errno);
        }

        stream_Set_Timeout($socket, $timeout);
        stream_Set_Blocking($socket, true);

        // hardcoded magic https://github.com/facebookarchive/RakNet/blob/1a169895a900c9fc4841c556e16514182b75faf8/Source/RakPeer.cpp#L135
        $OFFLINE_MESSAGE_DATA_ID = \pack('c*', 0x00, 0xFF, 0xFF, 0x00, 0xFE, 0xFE, 0xFE, 0xFE, 0xFD, 0xFD, 0xFD, 0xFD, 0x12, 0x34, 0x56, 0x78);
        $command = \pack('cQ', 0x01, time()); // DefaultMessageIDTypes::ID_UNCONNECTED_PING + 64bit current time
        $command .= $OFFLINE_MESSAGE_DATA_ID;
        $command .= \pack('Q', 2); // 64bit guid
        $length = \strlen($command);

        if($length !== fwrite($socket, $command, $length)) {
            throw new \Exception("Failed to write on socket.", E_WARNING);
        }

        $data = fread($socket, 4096);

        fclose($socket);

        if(empty($data) or $data === false) {
            throw new \Exception("Server failed to respond", E_WARNING);
        }
        if(substr($data, 0, 1) !== "\x1C") {
            throw new \Exception("First byte is not ID_UNCONNECTED_PONG.", E_WARNING);
        }
        if(substr($data, 17, 16) !== $OFFLINE_MESSAGE_DATA_ID) {
            throw new \Exception("Magic bytes do not match.");
        }

        // TODO: What are the 2 bytes after the magic?
        $data = \substr($data, 35);

        // TODO: If server-name contains a ';' it is not escaped, and will break this parsing
        $data = \explode(';', $data);

        return [
            'GameName' => $data[0],
            'HostName' => $data[1],
            'Protocol' => $data[2],
            'Version' => $data[3],
            'Players' => $data[4],
            'MaxPlayers' => $data[5],
            'Unknown2' => $data[6], // TODO: What is this?
            'Map' => $data[7],
            'GameMode' => $data[8],
            'Unknown3' => $data[9], // TODO: What is this?
        ];
    }


}
