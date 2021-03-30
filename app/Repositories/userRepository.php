<?php

namespace App\Repositories;



use App\Models\User;
use App\Repositories\Interfaces\userInterface;

class userRepository implements userInterface
{
    public function changepass($request)
    {
        // dd(auth()->user()->name);
        User::where('id',auth()->user()->id)->update([
            'password'=>$request->password,
            'change_password'=>'0'
        ]);

        return true;
    }

    public function user($id)
    {
        return User::where('id',$id)->first();
    }
}
