@extends('layouts.app')

@section('title')
    Profile | Bright Containers
@endsection

@section('content')
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row m-b-lg m-t-lg">
        <div class="col-md-6">
            <div class="profile-image">
                <img src="{{asset('storage/Logo/'.$user->comp_logo)}}" class="img-circle circle-border m-b-md" alt="profile">
            </div>
            <div class="profile-info">
                <div class="">
                    <div>
                        <h2 class="no-margins mt-4">
                            {{$user->name}}
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <table class="table small m-b-xs">
                <tbody>
                <tr>
                    <td>
                        <strong>142</strong> Orders
                    </td>
                    <td>
                        <strong>22</strong> Panding
                    </td>

                </tr>
                <tr>
                    <td>
                        <strong>61</strong> Comments
                    </td>
                    <td>
                        <strong>54</strong> Articles
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>154</strong> Tags
                    </td>
                    <td>
                        <strong>32</strong> Friends
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-3">
            <small>Sales in last 24h</small>
            <h2 class="no-margins">206 480</h2>
            <div id="sparkline1"><canvas style="display: inline-block; width: 289.8px; height: 50px; vertical-align: top;" width="289" height="50"></canvas></div>
        </div>
    </div>
</div>

@endsection
