@extends('layouts.app')

@section('title')

    @if (Auth::user())

    Set Password | Bright Containers
    @else
        Change Password | Bright Containers
    @endif
@endsection



@section('content')
<div class="middle-box text-center loginscreen animated fadeInDown">
    <div>
        <div>

            <h1 class="logo-name">Logo</h1>

        </div>
        @if (Auth::user())
            <p>Set Your New Password</p>
            <form class="m-t" role="form" method="POST" action="{{ route('donepassword') }}">
        @else
            <p>Change Password</p>
            <form class="m-t" role="form" method="POST" action="{{ route('passwordchanged',$email) }}">
        @endif
            @csrf
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="confirm-password" placeholder="Confirm Password" required>
            </div>
            <button type="submit" class="btn btn-primary block full-width m-b">Change Password</button>
        </form>

    </div>
</div>
@endsection
