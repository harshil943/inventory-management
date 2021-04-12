{{-- {{dd($user)}} --}}
@extends('layouts.app')

@section('title')
    Profile | Bright Containers
@endsection

@push('css')

    {{-- Select 2 CSS --}}
    <link href="{{ asset('css/plugins/select2/select2.min.css') }}" rel="stylesheet">

@endpush

@section('content')

<div class="container rounded bg-white mt-5 mb-5">
    <form action="{{route('updateprofile',auth()->user()->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" src="{{asset('storage/Logo/'.$user->comp_logo)}}">
                <span class="font-weight-bold">{{$user->name}}</span>
                <span class="text-black-50">{{$user->email}}</span><span> </span></div>
            </div>
            <div class="col-md-8 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12"><label class="labels">Name</label><input type="text" name="name" class="form-control" placeholder="Company name" value="{{$user->name}}"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Email ID</label><input type="text" name="email" class="form-control" placeholder="enter email id" value="{{$user->email}}"></div>
                        <div class="col-md-12"><label class="labels">PhoneNumber</label><input type="text" name="mobile" class="form-control" placeholder="enter phone number" value="{{$user->mobile}}"></div>
                        <div class="col-md-12"><label class="labels">Address</label><input type="text" name="address" class="form-control" placeholder="enter address" value="{{$user->address}}"></div>
                        <div class="col-md-12"><label class="labels">GST Number</label><input type="text" name="gst" class="form-control" placeholder="education" value="{{$user->gst_number}}"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6"><label class="labels">Country</label><select class="form-control" id="country" name="country" required>
                            @if (isset($user->countryCode))
                                <option value="{{$user->countryCode}}">{{$user->countryCode}}</option>
                            @else
                                <option></option>
                            @endif
                        </select></div>
                        <div class="col-md-6"><label class="labels">Company Logo</label><input type="file" name="comp_logo" value="{{asset('storage/Logo/'.$user->email)}}"></div>
                    </div>
                    <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Save Profile</button></div>
                </div>
            </div>
        </div>
    </div>
</form>
</div>
@endsection

@push('script')

    {{-- Select 2 JS --}}
    <script src="{{asset('js/plugins/select2/select2.full.min.js')}}"></script>


    {{-- File Upload JS --}}
    <script src="{{asset('js/plugins/jasny/jasny-bootstrap.min.js')}}"></script>

    {{-- Country Code JS --}}
    <script>
        $(document).ready(function(){
            $("#country").select2({
                placeholder: "Select a country",
                allowClear: true
            });
        });
        const url = '/country';
            window.onload = async function() {
            const response = await fetch(url);
            window.data = await response.json();
            conData = data;
            for (var i = 0; i < conData.length; i++) {
                var newOption = new Option(conData[i]['Iso']+" - "+conData[i]['name'],conData[i]['Iso'], false, false);
                // var newOption = new Option(conData[i]["State Code"]+" - "+conData[i]["State Name"],conData[i]["State Code"], false, false);
                $('#country').append(newOption);
            }
            $('#country').trigger('change');
        }
    </script>

@endpush
