<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\userInterface;

class userController extends Controller
{
    public $userRepository;

    public function __construct(userInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    protected function updateProfile(Request $request,$id)
    {
       $this->userRepository->updateProfile($request,$id);
       session()->flash('success', 'Profile Updated');
       return back();
    }
}
