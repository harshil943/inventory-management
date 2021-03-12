<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Repositories\Interfaces\userInterface;
class setPassController extends Controller
{
    private $userRepository;

    public function __construct(userInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function index()
    {
        return view('admin.setpassword');
    }

    public function changepass(Request $request)
    {
        // auth()->user()->password = Hash::make($request->password);
        // auth()->user()->password = $request->password;
        // auth()->user()->password_change = '0';
        // dd(auth()->user()->password_change);
        $this->userRepository->changepass($request);
        return redirect()->route('dashboard');
    }
}
