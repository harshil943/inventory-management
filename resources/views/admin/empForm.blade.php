@extends('layouts.app')

@section('content')
    
@include('admin.adminNav')
<div class="gray-bg container">
    <div class="text-center loginscreen animated fadeInDown">
        <div>
            <div>
                <h1 class="logo-name">Logo</h1>
            </div>
            <h3>Add Employee to <br>Bright Containers</h3>
            <p>Add Employee to see it in action.</p>
            <form class="m-t" role="form" method="POST" enctype="multipart/form-data" action="{{ route('employee.store') }}">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Name" autofocus>
        
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
        
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="company_name" type="text" class="form-control" name="company_name" required placeholder="Company Name">
                        </div>
                        <div class="form-group">
                            <textarea id="office_add" name="office_add" rows="3" class="form-control" placeholder="Parmenent Office Address" required></textarea>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
        
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                        </div>          
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-4">
                                    <select class="form-control" id="country" name="country" required>
                                        <option></option>
                                    </select>
                                </div>
                                <div class="col-sm-8">
                                    <input id="mobile" type="number" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" required autocomplete="mobile" placeholder="Contact Number">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <Label style="padding:10px;">Company Logo</Label>
                            <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                <div class="form-control" style="width:70%;" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                                <span class="input-group-addon btn btn-default btn-file"><span class="fileinput-new">Select file</span><span class="fileinput-exists">Change</span><input type="file" name="comp_logo" id="comp_logo"></span>
                                <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="checkbox ">
                        <label> 
                            <input type="checkbox" required>
                            <i></i> Agree the <a href="#"> terms and conditions  </a>
                        </label>
                    </div>
                </div>
                <button type="submit" class="ladda-button btn btn-primary m-b" data-style="expand-right">Register</button>    
                <p class="text-muted text-center">
                    <small>Already have an account?</small>
                    <center><a class="btn btn-white btn-block" style="width:200px;" href="login">Login</a></center>
                </p>
            </form>
        </div>
    </div>
</div>
@endsection