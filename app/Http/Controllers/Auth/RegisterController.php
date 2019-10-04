<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\User;
use App\Member;
use Carbon\Carbon;
use App\Mail\Welcome;
use App\Events\NewUserHasRegisteredEvent;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = 'reg-success';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            // 'password' => ['required', 'string', 'min:8', 'confirmed'],
            'asal_gereja_atau_organisasi' => ['required'],
            'phone_number' => ['required'],
            'sesi' => ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make("yrmovement"),
            'code_registration' => Str::random(5),
        ]);

        $member = Member::create([
            'user_id' => $user->id,
            'asal_gereja_atau_organisasi' => $data['asal_gereja_atau_organisasi'],
            'phone_number' => $data['phone_number'],
            'sesi' => implode(", ", $data['sesi']),
            // 'line_id' => $data['line_id'],
        ]);
        $user->save();
        $member->save();

        event(new NewUserHasRegisteredEvent($user));

        return $user;
    }
}
