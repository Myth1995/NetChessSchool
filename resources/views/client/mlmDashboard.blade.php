@extends('client.layout.app')

@section('title', 'MLM DASHBOARD')
@section('custom_css')
<link href="{{asset('assets/chess-assets/css/profile.css')}}" rel="stylesheet">
<style>
    #myTab{
        display: flex;
        flex-direction: column;
    }
</style>
@endsection
@section('content')
@include('client.components.body-header')
<div class="container emp-profile" style="margin-top: 3rem;">
    <form method="post">
        <div class="row">
            <div class="col-md-6">
                <div class="profile-head">
                    <div class="score-bar position-relative" >
                        <small>NCS COIN</small>
                        <h1 style="font-size: 50px;" class="color-yellow">
                            {{ Auth()->user()->ncs_coin }}
                        </h1>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="profile-head">
                    <div class="score-bar position-relative" >
                        <small>INVITE URL</small>
                        <h1 style="font-size: 20px; margin-top: 1rem;" class="color-red">
                            {{url('mlm/join/'.Auth()->user()->user_name)}}
                        </h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 2rem;">
            <div class="col-md-4 col-sm-12">
                <div class="profile-head">
                    <ul class="nav nav-tabs my-info-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-target="couse" id="couse-tab" data-toggle="tab"
                                href="#couse-tab-panel" role="tab" aria-controls="couse-tab-panel"
                                aria-selected="true">My courses</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-target="subscription" id="subscription-tab" data-toggle="tab"
                                href="#subscription-tab-panel" role="tab" aria-controls="subscription-tab-panel"
                                aria-selected="false">Subscriptions</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-target="setting" id="setting-tab" data-toggle="tab"
                                href="#setting-tab-panel" role="tab" aria-controls="setting-tab-panel"
                                aria-selected="false">Settings</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-8 col-sm-12">
                <div class="tab-content profile-tab my-info-detail-panel" id="myTabContent">
                    <div class="tab-pane fade show active" id="couse-tab-panel" role="tabpanel"
                        aria-labelledby="couse-tab">
                        <div class="row">
                            
                        </div>
                    </div>
                    <div class="tab-pane fade" id="subscription-tab-panel" role="tabpanel"
                        aria-labelledby="subscription-tab">
                        subscription panel
                    </div>
                    <div class="tab-pane fade" id="setting-tab-panel" role="tabpanel" aria-labelledby="setting-tab">
                        setting panel
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@section('custom_js')
<!-- <script src="{{asset('assets/leftsidebar/popper.js')}}"></script>
<script src="{{asset('assets/chess-assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/leftsidebar/main.js')}}"></script> -->
<script>
$(document).ready(function() {
    console.log("MLM DASHBOARD page init!");


});
</script>
@endsection