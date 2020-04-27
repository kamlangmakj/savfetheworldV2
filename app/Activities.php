<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activities extends Model
{
    protected $table = "activities";

//    public function activitiesStatus() {
//        return $this->belongsTo(ActivitiesStatus::class,"status_join_activities");
//    }

    public function joinActivities(){
        return $this->belongsToMany(User::class, 'join_activities','activities_id','users_id');
    }

    public function saveActivities(){
        return $this->belongsToMany(User::class, 'save_activities','activities_id','users_id');
    }

    public function geography() {
        return $this->belongsTo(Geography::class, 'geography_id');
    }

    public function province() {
        return $this->belongsTo(Province::class, 'province_id');
    }

    public function category_types_activity() {
        return $this->belongsTo(CategoryTypesActivities::class, 'category_types_activities_id');
    }

//    public function joinActivities(){
//        return $this->belongsToMany(User::class, 'join_activities','activities_id','users_id','status_id');
//    }
}
