<?php
namespace App\Http\Controllers;

use App\Contacts;
use App\JoinActivities;
use App\Province;
use App\ReceiveNews;
use App\SaveActivities;
use App\TrackingRewards;
use App\Users;
use App\Activities;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $today = Carbon::today()->addYear(543)->translatedFormat('d M Y');

        $yesterday = Carbon::yesterday()->addYear(543)->translatedFormat('d M Y');

        $startWeek = Carbon::now()->startOfWeek()->addYear(543)->translatedFormat('d M Y');
        $endWeek = Carbon::now()->endOfWeek()->addYear(543)->translatedFormat('d M Y');

        $startMonth = Carbon::now()->startOfMonth()->addYear(543)->translatedFormat('d M Y');
        $endMonth = Carbon::now()->endOfMonth()->addYear(543)->translatedFormat('d M Y');

        $currentDate = \Carbon\Carbon::now();
        $agoDate = $currentDate->subDays($currentDate->dayOfWeek)->addYear(543)->translatedFormat('d M Y');
        $nowDate = $currentDate->subDays($currentDate->dayOfWeek - 1)->translatedFormat('d M Y');

        $agoMonth = $currentDate->subDays($currentDate->weekOfMonth)->translatedFormat('d M Y');
        $nowMonth = $currentDate->subDays($currentDate->weekOfMonth)->translatedFormat('d M Y');

        $users = DB::table('users');
        $activities = Activities::all();
        $provinces = Province::all();
        $rewards = DB::table('rewards');
        $tracking_rewards = TrackingRewards::all()->where('status_id', '!=', 1);
//        $join_activities = DB::table('join_activities');
//        $tab1_contents = DB::table('activities')->orderBy('started_date','ASC')->limit(4)->get();
        $count_user = JoinActivities::count();

        $activities_forest = Activities::orderBy('created_at', 'DESC')->where('category_types_activities_id', '<=', 10)->limit(3)->get();
        $activities_sea = Activities::orderBy('created_at', 'DESC')->where('category_types_activities_id', '>=', 11)->where('category_types_activities_id', '<', 17)->limit(3)->get();
        $activities_country = Activities::orderBy('created_at', 'DESC')->where('category_types_activities_id', '>=', 17)->limit(3)->get();

        $tab1_contents_1 = Activities::whereDay('started_date', '=', date('d M Y'))->orderBy('updated_at', 'DESC')->paginate(4);
        $tab1_contents_2 = Activities::whereDate('started_date', '>=', Carbon::now()->startOfWeek())->whereDate('started_date', '<=', Carbon::now()->endOfWeek())->orderBy('started_date', 'ASC')->limit(4)->get();
        $tab1_contents_3 = Activities::whereDate('started_date', '>=', Carbon::now()->startOfMonth())->whereDate('started_date', '<=', Carbon::now()->endOfMonth())->orderBy('started_date', 'ASC')->limit(4)->get();

        $tab4_contents_1 = Activities::whereDate('expired_date', '=', Carbon::yesterday())->orderBy('expired_date', 'ASC')->limit(4)->get();
        $tab4_contents_2 = Activities::whereDate('expired_date', '>=', Carbon::yesterday()->subDays(7))->whereDate('expired_date', '<=', Carbon::yesterday())->orderBy('expired_date', 'DESC')->limit(4)->get();
        $tab4_contents_3 = Activities::whereDate('expired_date', '>=', Carbon::yesterday()->subDays(14))->whereDate('expired_date', '<=', Carbon::yesterday())->orderBy('expired_date', 'DESC')->limit(4)->get();
//        $tab4_contents_3 = DB::table('activities')->orderBy('expired_date','DESC')->limit(4)->get();


        $slides1 = Activities::orderBy('updated_at', 'DESC')->limit(5)->get();


//        $contents1 = DB::table('activities')->orderBy('updated_at','DESC')->limit(4)->get();

        //        return $activitiescontent->get();
        return view('user.index', [
            'users' => $users,
            'activities' => $activities,
            'activities_forest' => $activities_forest,
            'activities_sea' => $activities_sea,
            'activities_country' => $activities_country,
            'provinces' => $provinces,
            'rewards' => $rewards,
            'tracking_rewards' => $tracking_rewards,
            'tab1_contents_1' => $tab1_contents_1,
            'tab1_contents_2' => $tab1_contents_2,
            'tab1_contents_3' => $tab1_contents_3,
            'tab4_contents_1' => $tab4_contents_1,
            'tab4_contents_2' => $tab4_contents_2,
            'tab4_contents_3' => $tab4_contents_3,
            'today' => $today,
            'yesterday' => $yesterday,
            'startWeek' => $startWeek,
            'endWeek' => $endWeek,
            'startMonth' => $startMonth,
            'endMonth' => $endMonth,
            'agoDate' => $agoDate,
            'nowDate' => $nowDate,
            'agoMonth' => $agoMonth,
            'nowMonth' => $nowMonth,
            'count_user' => $count_user,
            'slides1' => $slides1,
        ]);
    }

//    public function getProvinceNameById($id){
//        $provinces = Province::all();
//        foreach ( $provinces as $province ) {
//            if ( $id == $province->PROVINCE_ID ) {
//                return $province->PROVINCE_NAME;
//            }
//        }
//        return '';
//
//        return view('user.index',[
//            'provinces'=>$provinces,]);
//    }

    public function getActivityTabsDetail(Request $request, $filter)
    {
        $activities = Activities::all();
        if ($filter == 'today') {
            $header = 'เริ่มภายในวันนี้';
            $activities = Activities::whereDay('started_date', '=', date('d M Y'))->orderBy('updated_at', 'DESC')->paginate(4);
        } elseif ($filter == 'thisweek') {
            $header = 'เริ่มภายในสัปดาห์นี้';
            $activities = Activities::whereDate('started_date', '>=', Carbon::now()->startOfWeek())->whereDate('started_date', '<=', Carbon::now()->endOfWeek())->orderBy('started_date', 'ASC')->paginate(4);
        } elseif ($filter == 'thismonth') {
            $header = 'เริ่มภายในเดือนนี้';
            $activities = Activities::whereDate('started_date', '>=', Carbon::now()->startOfMonth())->whereDate('started_date', '<=', Carbon::now()->endOfMonth())->orderBy('started_date', 'ASC')->paginate(4);
        } elseif ($filter == 'yesterday') {
            $header = 'จบไปแล้วเมื่อวานนี้';
            $activities = Activities::whereDate('expired_date', '=', Carbon::yesterday())->orderBy('expired_date', 'ASC')->paginate(4);
        } elseif ($filter == 'end7days') {
            $header = 'จบไปแล้วในช่วง 7 วัน';
            $activities = Activities::whereDate('expired_date', '>=', Carbon::yesterday()->subDays(7))->whereDate('expired_date', '<=', Carbon::yesterday())->orderBy('expired_date', 'DESC')->paginate(4);
        } elseif ($filter == 'end14days') {
            $header = 'จบไปแล้วในช่วง 14 วัน';
            $activities = Activities::whereDate('expired_date', '>=', Carbon::yesterday()->subDays(14))->whereDate('expired_date', '<=', Carbon::yesterday())->orderBy('expired_date', 'DESC')->paginate(4);
        } elseif ($filter == 'forest') {
            $header = 'หมวดหมู่ป่าไม้ - ทั้งหมด';
            $activities = Activities::orderBy('created_at', 'DESC')->where('category_types_activities_id', '<=', 10)->paginate(4);
        } elseif ($filter == 'sea') {
            $header = 'หมวดหมู่ทะเล - ทั้งหมด';
            $activities = Activities::orderBy('created_at', 'DESC')->where('category_types_activities_id', '>=', 11)->where('category_types_activities_id', '<', 17)->paginate(4);
        } elseif ($filter == 'country') {
            $header = 'หมวดหมู่ชุมชน - ทั้งหมด';
            $activities = Activities::orderBy('created_at', 'DESC')->where('category_types_activities_id', '>=', 17)->paginate(4);
        }
        return view('user.activity_tabs_detail', compact('activities', 'header'));
    }

//    public function postReceiveNews(Request $request) {
//        $receive_news = new ReceiveNews();
//        $receive_news->email = $request->get('email');
//        $receive_news->save();
//        return back();
//    }
//
//    public function postContact(Request $request) {
//        $contacts = new Contacts();
//        $contacts->name = $request->get('name');
//        $contacts->email = $request->get('email');
//        $contacts->topic = $request->get('topic');
//        $contacts->message = $request->get('message');
//        $contacts->save();
//        return back();
//    }


    public function getCheckConfirmJoin($id)
    {
//        echo Str::random(6);
        $join_activity = JoinActivities::find($id);
        return view('user.check_confirm_join', [
            'join_activity' => $join_activity
        ]);
    }

    public function postCheckConfirmJoin(Request $request)
    {
        $join_activity = JoinActivities::find($request->get('id'));
//        $join_activity->number = $request->get('number');
        if ($request->get('number') == $request->get('number2')) {
            $join_activity->status_id = 2;
            $join_activity->save();
            return redirect()->back();
        }
        else {
            return redirect()->back();
        }

    }

    public function postSaveActivities(Request $request)
    {
        $save_activities = SaveActivities::find($request->get('save_activities_id'));
        dd($save_activities);
        $save_activities->saveActivities()->attach(Auth::user());


        $save_activities->save();
        return redirect()->back();
    }
}



