<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activities extends Model
{
    protected $table = "activities";

    public function joinActivities(){
        return $this->belongsToMany(User::class, 'join_activities','activities_id','users_id');
    }
}
