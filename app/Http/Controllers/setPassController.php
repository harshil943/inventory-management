<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Repositories\Interfaces\userInterface;
use App\Repositories\userRepository;
use Illuminate\Support\Facades\Validator;

class setPassController extends Controller
{
    private $userRepository;

    public function __construct(userInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function index()
    {
        return view('auth.passwords.setpassword');
    }

    public function changepass(Request $request)
    {
        if ($request->password != $request->confirm_password) {
            session()->flash('error',"Password Doesn't match ! please try again");
            return back();
        }
        $this->userRepository->changepass($request);
        session()->flash('success','Password changed successfully');
        return redirect()->route('home');
    }

    public function forgotpassword()
    {
        return view('auth.passwords.email');
    }

    public function resetpassword(Request $request)
    {

        // dd($request);
        return redirect()->route('home');
    }

    public function newpass($email)
    {

        $this->userRepository->newpass($email);
        return view('auth.passwords.setpassword')->with('email',$email);
    }

    public function passwordchanged($email,Request $request)
    {
        if ($request->password != $request->confirm_password) {
            session()->flash('error',"Password Doesn't match ! please try again");
            return back();
        }
        $this->userRepository->passwordchanged($request,$email);
        session()->flash('success','Password changed successfully');
        return redirect()->route('login');
    }
}
