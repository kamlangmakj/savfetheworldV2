<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rewards extends Model
{
    protected $table = "rewards";

    public function rewardsCategory() {
        return $this->belongsTo(RewardsCategory::class,"rewards_category_id");
    }

    public function trackingRewards(){
        return $this->belongsToMany(User::class, 'tracking_rewards','rewards_id','users_id');
    }
}
