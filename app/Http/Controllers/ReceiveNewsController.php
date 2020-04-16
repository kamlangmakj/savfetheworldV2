<?php

namespace App\Http\Controllers;

use App\Contacts;
use App\ReceiveNews;
use App\Rewards;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReceiveNewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    //    admin rewards
    public function getReceiveNews() {
        $receive_news = DB::table('receive_news')->paginate(5);
        return view('admin.receive_news.receive_news',compact('receive_news'));
    }

    public function postReceiveNews(Request $request) {
        $receive_news = new ReceiveNews();
        $receive_news->email = $request->get('email');
        $receive_news->save();
        return back();
    }

    public function postEditReceiveNews(Request $request) {
//        return $request->all();
        $receive_news = ReceiveNews::find($request->get('id'));
        $receive_news->status_id = $request->get('status_id');
        $receive_news->save();
        return redirect()->back();
    }

    public function getEditReceiveNews($id) {
        $receive_news = ReceiveNews::find($id);
        return view('admin.receive_news.edit_receive_news',[
            'receive_news'=>$receive_news
        ]);
    }

    public function postDeleteReceiveNews(Request $request) {
        $receive_news = ReceiveNews::find($request->get('id'));
        $receive_news -> delete();
        return redirect()->back();
    }


}
