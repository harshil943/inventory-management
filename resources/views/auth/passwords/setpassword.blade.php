@extends('layouts.app')

@section('title')
    Set Password | Bright Containers
@endsection



@section('content')
<div class="middle-box text-center loginscreen animated fadeInDown">
    <div>
        <div>

            <h1 class="logo-name">Logo</h1>

        </div>

        <p>Set Your New Password</p>
        <form class="m-t" role="form" method="POST" action="{{ route('donepassword') }}">
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
