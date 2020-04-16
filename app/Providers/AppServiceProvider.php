<?php

namespace App\Providers;

use App\Contacts;
use App\JoinActivities;
use App\ReceiveNews;
use App\Rewards;
use App\TrackingRewards;
use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);

        View::share(
            'trackingRewardCount', TrackingRewards::where('status_id','=', 1)->count()
        );

        View::share(
            'contactCount', Contacts::where('status_id','=', 1)->count()
        );

        View::share(
            'receiveNewsCount', ReceiveNews::where('status_id','=', 1)->count()
        );

        View::share(
            'joinActivitiesCount', JoinActivities::where('status_id','=', 1)->count()
        );
    }
}
