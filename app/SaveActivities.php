<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaveActivities extends Model
{
    protected $table = "save_activities";

    public function activity()
    {
        return $this->belongsTo(Activities::class, 'activities_id');
    }

    public function user()
    {
        return $this->belongsTo(Users::class, 'users_id');
    }
}
