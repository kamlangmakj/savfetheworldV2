<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activities extends Model
{
    protected $table = "activities";

    public function rewardsCategory() {
//    return $this->belongsTo(RewardsCategory::class,"rewards_category_id");
}
}
