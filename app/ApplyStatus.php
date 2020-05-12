<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplyStatus extends Model
{

    public $table = "applystatuses";

    public function applications()
    {
        return $this->belongsToMany(Application::class);
    }

}
