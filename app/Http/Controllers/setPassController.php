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
        return view('auth.passwords.setpassword');
    }

    public function changepass(Request $request)
    {
        $this->userRepository->changepass($request);
        return redirect()->route('home');
    }
}
