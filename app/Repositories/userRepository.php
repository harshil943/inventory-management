<?php

namespace App\Repositories;



use App\Models\User;
use App\Repositories\Interfaces\userInterface;
use Illuminate\Support\Facades\Mail;
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
        return User::where('id',$id)->firstorfail();
    }

    public function resetpassword($request)
    {
        // dd(User::where('email',$request->email)->first());
        $details = [
            'name' => $request->email,
            'title' => 'Mail from Bright Containers',
            'body' => 'If you requested to change password click below button'
        ];
        // dd($request->email);
        \Mail::to($request->email)->send(new \App\Mail\passwordMail($details));
        // Mail::to('harshilamreliya7@gmail.com')->send(new \App\Mail\passwordMail($details));
        return true;
    }
}
