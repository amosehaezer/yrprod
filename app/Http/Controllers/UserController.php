<?php

namespace App\Http\Controllers;

// use DB;
use Input;
use App\User;
use App\Member;
use App\Mail\Welcome;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Events\NewUserHasRegisteredEvent;

class UserController extends Controller
{
    
    public function index(Request $request) {
        // $users = User::paginate(10);
        $search = $request->search;
        $users = User::where('name', 'LIKE', "%$search%")->paginate(10);
        $users->appends(['search' => $search]);

        return view('admin.user.index', compact('users'));
    }

    // public function searchChurch(Request $request) {
    //     $search = $request->searchchurch;
    //     $users = DB::table('users')
    //                 ->join('members', 'users.id', '=', 'members.user_id')
    //                 ->where('asal_gereja_atau_organisasi', 'LIKE', "%$search%")->paginate();
    //     $users = $user->where('asal_gereja_atau_organisasi', 'LIKE', "%$search%")->paginate();
    //     $users->appends(['search' => $search]);

    //     return view('admin.user.index', compact('users'));
    // }

    // public function searchUser(Request $request) {

    //     $sortBy = 'id';
    //     $orderBy = 'desc';
    //     $perPage = 15;
    //     $q = null;
    //     $r = null;
        
    //     if($request->has('orderBy')) $orderBy = $request->query('orderBy');
    //     if($request->has('sortBy')) $sortBy = $request->query('sortBy');
    //     if($request->has('perPage')) $perPage = $request->query('perPage');
    //     if($request->has('q')) $q = $request->query('q');
    //     if($request->has('r')) $r = $request->query('r');

    //     $users = User::search($q)->orderBy($sortBy, $orderBy)->paginate($perPage);
    //     $members = M::search($r)->orderBy($sortBy, $orderBy)->paginate($perPage);
        
    //     return view('admin.user.searchUser', compact('users', 'orderBy', 'sortBy', 'q', 'perPage'));
    // }

    // public function searchCategory(Request $request) {

    //     $sortBy = 'id';
    //     $orderBy = 'desc';
    //     $perPage = 15;
    //     $q = null;

    //     if($request->has('orderBy')) $orderBy = $request->query('orderBy');
    //     if($request->has('sortBy')) $sortBy = $request->query('sortBy');
    //     if($request->has('perPage')) $perPage = $request->query('perPage');
    //     if($request->has('q')) $q = $request->query('q');

        // $users = DB::table('users')
        //             ->join('members', 'users.id', '=', 'members.user_id')
        //             ->paginate();
        // $users = DB::table('users')
            // ->leftJoin('members', 'users.id', '=', 'members.id')
            // ->get();

        // $users = User::paginate(10);
    //     $users = Member::search($q)->orderBy($sortBy, $orderBy)->paginate($perPage);

    //     return view('admin.user.searchCategory', compact('users', 'orderBy', 'sortBy', 'q', 'perPage'));
    // }

    public function create() {

        return view('admin.user.create');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'asal_gereja_atau_organisasi' => ['required'],
            'phone_number' => ['required'],
            'sesi' => ['required'],
        ]);
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

    // public function edit($id) {

        // $user = User::find($id)->get();
        
        // return view('admin.edit-user', ['user' => $user]);
    // }

    public function edit($id) {
        $user  = User::find($id);
        // $member = user()->member;
        return view('admin.user.update', ['user' => $user]);
    }

    public function update($id, Request $request)
    {
        $this->validate($request,[
            'nama' => 'required',
            'email' => 'required',
        ]);
    
        $user = User::find($id);
        $user->name = $request->nama;
        // $user->member->asal_gereja_atau_organisasi = $request->asal_gereja_atau_organisasi;
        $user->email = $request->email;
        // $user->member->phone_number = $request->phone_number;
        $user->save();
        return redirect('/user');
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
}
