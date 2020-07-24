<?php

namespace App\Http\Controllers;

use App\Notifications\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $data = array();

        foreach ($user->unreadNotifications as $notification) {
            $data[] =  $notification->data;
            $notification->markAsRead();
        }
        if(count($data)>0){
            return view('home')->with(["data"=>$data]);
        }
        return view('home');
    }

    public function sendDatabaseNotification(){
        $user = Auth::user();
        $user->notify(new Purchase());

        return redirect()->back();
    }
}
