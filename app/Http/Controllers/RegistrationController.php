<?php

namespace App\Http\Controllers;

use App\User;
use App\Member;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegistrationController extends Controller
{
    use RegistersUsers;
    protected $redirectTo = '/home';
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function menu() {
        return view('onsite.menu');
    }

    public function viewOnsite() {
        return view('onsite.register-onsite');
    }

    public function storeOnsite(Request $request) {
        $rules = [
            'name' => 'required',
            'asal_gereja_atau_organisasi' => 'required'
        ];
        $this->validate($request, $rules);

        $user = new User();
        
            $user->name = $request->name;
            $user->email = $request->input('email', '-');
            $user->password = Hash::make("yrmovement");
            $user->code_registration = Str::random(5);
        
        $user->save();
        $member = new Member();

            $member->user_id = $user->id;

            $member->asal_gereja_atau_organisasi = $request->asal_gereja_atau_organisasi;
            $member->phone_number = $request->phone_number;
            $member->sesi = $request->input('sesi', '-');

        $member->save();
        // return view('onsite.register-onsite', ['success' => 'Success Input User', 'data' => $user]);
        return $user;
    }
}