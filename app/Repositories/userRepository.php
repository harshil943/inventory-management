<?php

namespace App\Repositories;



use App\Models\User;
use App\Repositories\Interfaces\userInterface;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
class userRepository implements userInterface
{
    public function changepass($request)
    {
        // dd(auth()->user()->name);
        User::where('id',auth()->user()->id)->update([
            'password'=>Hash::make($request->password),
            'password_change'=>'0'
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
        Mail::to($request->email)->send(new \App\Mail\passwordMail($details));
        // \Mail::to('harshilamreliya7@gmail.com')->send(new \App\Mail\passwordMail($details));
        return true;
    }

    public function newpass($email)
    {
       return User::where('email',$email)->update(array(
            'password_change' => '1',
        ));
    }

    public function passwordchanged($request,$email)
    {
        User::where('email',$email)->update(array(
            'password_change' => '0',
            'password' => Hash::make($request->password)
        ));
        return true;
    }

    public function updateProfile($request,$id)
    {
        if($request['comp_logo'] ?? '')
        {
            $logoName = null;
            $logo = $request['comp_logo'];
            $logoName = $request['email'].'.'.$logo->getClientOriginalExtension();
            $path = $request['comp_logo']->storeAs('public/Logo',$logoName);

             User::where('id',$id)->update([
                'name' => $request['name'],
                'email' => $request['email'],
                'countryCode' => $request['country'],
                'mobile' => $request['mobile'],
                'address' => $request['address'],
                'gst_number' => $request['gst'],
                'comp_logo' => $logoName
                ]);

            // dd('success');
            return  true;
        }
        else{

            User::where('id',$id)->update([
                'name' => $request['name'],
                'email' => $request['email'],
                'countryCode' => $request['country'],
                'mobile' => $request['mobile'],
                'address' => $request['address'],
                'gst_number' => $request['gst'],
                ]);


            // dd('success with out image');
            return true;
        }
    }
}
