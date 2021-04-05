<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Events\UserRegistered;
use Illuminate\Support\Facades\Session;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {

        if($data['comp_logo'] ?? '')
        {
            $logoName = null;
            $logo = $data['comp_logo'];
            $logoName = $data['email'].'.'.$logo->getClientOriginalExtension();
            $path = $data['comp_logo']->storeAs('public/Logo',$logoName);

            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'countryCode' => $data['country'],
                'mobile' => $data['mobile'],
                'address' => $data['office_add'],
                'gst_number' => $data['gst'],
                'comp_logo' => $logoName
                ]);

            event(new UserRegistered($user));
            session()->flash('success', 'Welcome to Bright Containers');
            return  $user;
        }
        else{

            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'countryCode' => $data['country'],
                'mobile' => $data['mobile'],
                'address' => $data['office_add'],
                'gst_number' => $data['gst'],
                ]);

            event(new UserRegistered($user));
            session()->flash('success', 'Welcome to Bright Containers');
            return $user;
        }



    }
}
