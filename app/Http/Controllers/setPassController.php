<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Repositories\Interfaces\userInterface;
use App\Repositories\userRepository;

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
        $this->userRepository->changepass($request);
        return redirect()->route('home');
    }

    public function forgotpassword()
    {
        return view('auth.passwords.email');
    }

    public function resetpassword(Request $request)
    {
        $this->userRepository->resetpassword($request);
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
        $this->userRepository->passwordchanged($request,$email);
        return redirect()->route('login');
    }
}
