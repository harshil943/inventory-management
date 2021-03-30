<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Interfaces\userInterface;
class profileController extends Controller
{
    protected $userRepository;

    public function __construct(userInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function userProfile()
    {
        $user = $this->userRepository->user(Auth::user()->id);
        return view('profile.userProfile')->with('user',$user);
    }
}
