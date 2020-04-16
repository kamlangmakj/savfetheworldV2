<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrackingRewards extends Model
{
    protected $table = "tracking_rewards";

    public function trackingRewardsStatus() {
        return $this->belongsTo(TrackingRewardsStatus::class,"status_tracking_rewards");
    }

    public function reward() {
        return $this->belongsTo(Rewards::class, 'rewards_id');
    }

    public function user() {
        return $this->belongsTo(Users::class, 'users_id');
    }
}
