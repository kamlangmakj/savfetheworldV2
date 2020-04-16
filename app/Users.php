<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Users extends Model
{
    protected $table = "users";
    use SoftDeletes;

    public function viewGeography() {
        return $this->belongsTo(Geography::class,"geography_id");
    }
    public function viewDistrict() {
        return $this->belongsTo(Geography::class,"district_id");
    }
    public function viewProvince() {
        return $this->belongsTo(Geography::class,"province_id");
    }
    public function viewAmphur() {
        return $this->belongsTo(Geography::class,"amphur_id");
    }
    public function categoryTypesActivities() {
        return $this->belongsTo(CategoryTypesActivities::class,"category_types_activities_id");
    }
}
