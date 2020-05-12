<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{

    public $primaryKey = "id";

    public $fillable = ["functie", "motivatie", "ervaring", "waaromjij"];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function applystatus()
    {
        return $this->belongsTo(ApplyStatus::class);
    }


}
