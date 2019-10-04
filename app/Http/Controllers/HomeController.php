<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\User;
use App\Member;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->admin == 0) {
            return view('member.home');
        } else {
            return view('admin.dashboard');
        }
    }
    public function totalUser() {
        $count = Member::count();
        $sesi1 = DB::table('members')->where('sesi', 'LIKE', '%Sesi 1%')->get();
        $sesi2 = DB::table('members')->where('sesi', 'LIKE', '%Sesi 2%')->get();
        $sesi3 = DB::table('members')->where('sesi', 'LIKE', '%Sesi 3%')->get();
        return view('total-user')->with('member', $count)
                                ->with('sesi1', $sesi1)
                                ->with('sesi2', $sesi2)
                                ->with('sesi3', $sesi3);
    }
}
