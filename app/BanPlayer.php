<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BanPlayer extends Model
{
    public $connection = "mysql2";
    public $table = "banPlayers";
    public $primaryKey = "player";
    public $incrementing = false;
    protected $keyType = 'string';


    public function getTime()
    {
        $remainingTime = $this->banTime - time();
        $day = floor($remainingTime / 86400);
        $hourSeconds = $remainingTime % 86400;
        $hour = floor($hourSeconds / 3600);
        $minuteSec = $hourSeconds % 3600;
        $minute = floor($minuteSec / 60);
        $remainingSec = $minuteSec % 60;
        $second = ceil($remainingSec);

        return ["days" => $day, "hours" => $hour, "minutes" => $minute, "seconds" => $second];
    }
}
