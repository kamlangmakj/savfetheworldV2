<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rewards extends Model
{
    protected $table = "rewards";

    public function rewardsCategory() {
        return $this->belongsTo(RewardsCategory::class,"rewards_category_id");
    }
}
