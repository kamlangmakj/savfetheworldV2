<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JoinActivities extends Model
{
    protected $table = "join_activities";
    use SoftDeletes;

    public function activity()
    {
        return $this->belongsTo(Activities::class, 'activities_id');
    }

    public function user()
    {
        return $this->belongsTo(Users::class, 'users_id');
    }

    public function status()
    {
        return $this->belongsTo(ActivitiesStatus::class, 'status_id');
    }
}
