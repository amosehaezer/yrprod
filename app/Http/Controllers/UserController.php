<?php

namespace App\Http\Controllers;

use DB;
use App\User;
use App\Member;
use App\Mail\Welcome;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Events\NewUserHasRegisteredEvent;

class UserController extends Controller
{
    public function index() {
        $users = User::paginate(10);

        return view('admin.user.index', compact('users'));
    }
    public function create() {

        return view('admin.user.create');
    }
    public function store(Request $request) {

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make("yrmovement");
        $user->code_registration = Str::random(5);
        
        $user->save();

        $member = new Member();

        $member->user_id = $user->id;
        $member->asal_gereja_atau_organisasi = $request->asal_gereja_atau_organisasi;
        $member->phone_number = $request->phone_number;
        $member->sesi = implode(',' ,$request->sesi);

        $member->save();

        event(new NewUserHasRegisteredEvent($user));

        return redirect('/user');
    }
    public function edit($id) {

        $user = User::find($id)->get();
        
        return view('admin.edit-user', ['user' => $user]);
    }
    public function update(Request $request, $id) {

        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->code_registration = Str::random(5);
        
        $user->save();
        // $member = new Member();
        $member->user_id = $user->id;
        $member->asal_gereja_atau_organisasi = $request->asal_gereja_atau_organisasi;
        $member->phone_number = $request->phone_number;
        $member->sesi = implode(',' ,$request->sesi);
        
        $member->save();

        // event(new NewUserHasRegisteredEvent($user));

        return redirect('user');
    }
    public function destroy($id) {

        $user = User::find($id);
        $user->delete();

        return redirect('user')->with('success', 'User deleted');
    }
    public function totalUser() {

        $count = Member::count();
        $sesi1 = DB::table('members')->where('sesi', 'LIKE', '%Sesi 1%')->get();
        $sesi2 = DB::table('members')->where('sesi', 'LIKE', '%Sesi 2%')->get();
        $sesi3 = DB::table('members')->where('sesi', 'LIKE', '%Sesi 3%')->get();
        
        return view('admin.total-user')->with('member', $count)
                                ->with('sesi1', $sesi1)
                                ->with('sesi2', $sesi2)
                                ->with('sesi3', $sesi3);
    }
    public function fetchjson() {
        $email = DB::table('users')->select('email')->get();

        return $email->toJson();
    }
    public function search() {
        return view('admin.user.search');
    }
}
