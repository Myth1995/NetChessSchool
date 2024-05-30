@extends('client.layout.app')

@section('title', 'profile')
@section('custom_css')
<link href="{{asset('assets/chess-assets/css/profile.css')}}" rel="stylesheet">
<style>

</style>
@endsection
@section('content')

<div class="container emp-profile">
    <form method="post">
        <div class="row">
            <div class="col-md-4">
                <div class="profile-img">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog"
                        alt="" />
                    <div class="file btn btn-lg btn-primary">
                        Change Avatar
                        <input type="file" name="file" />
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="profile-head">
                    <h5>
                        {{ @$user->email }}
                    </h5>
                    <div class="score-bar position-relative" >
                        <small class="position-absolute">score</small><br />
                        <h1>
                            {{ @$user->point }}
                        </h1>
                    </div>
                    <p class="proile-rating">RANKINGS : <span>8/10</span></p>
                    <ul class="nav nav-tabs my-info-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-target = "couse" id="couse-tab" data-toggle="tab" href="#couse-tab-panel" role="tab"
                                aria-controls="couse-tab-panel" aria-selected="true">My courses</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-target = "tests" id="tests-tab" data-toggle="tab" href="#tests-tab-panel" role="tab"
                                aria-controls="tests-tab-panel" aria-selected="false">Tests</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-target = "subscription" id="subscription-tab" data-toggle="tab" href="#subscription-tab-panel" role="tab"
                                aria-controls="subscription-tab-panel" aria-selected="false">Subscriptions</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-target = "setting" id="setting-tab" data-toggle="tab" href="#setting-tab-panel" role="tab"
                                aria-controls="setting-tab-panel" aria-selected="false">Settings</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2">
                <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="profile-work row">
                    <div class="col-md-6 col-sm-12 info-item-bar">
                        <div class="info-item">
                            <p>NICK NAME</p>
                            <a href="">{{ @$user->user_name }}</a><br />
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 info-item-bar">
                        <div class="info-item">
                            <p>NAME</p>
                            <a href="">{{ @$user->first_name ." ". @$user->last_name }}</a><br />
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 info-item-bar">
                        <div class="info-item">
                            <p>BIRTHDAY</p>
                            <a href="">{{ @$user->birthday }}</a><br />    
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 info-item-bar">
                        <div class="info-item">
                            <p>PHONE</p>
                            <a href="">{{ @$user->phone_number }}</a><br />    
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 info-item-bar">
                        <div class="info-item">
                            <p>COUNTRY</p>
                            <a href="">{{ @$user->country }}</a><br />    
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 info-item-bar">
                        <div class="info-item">
                            <p>AGE</p>
                            <a href="">{{ @$user->age }}</a>    
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="tab-content profile-tab my-info-detail-panel" id="myTabContent">
                    <div class="tab-pane fade show active" id="couse-tab-panel" role="tabpanel" aria-labelledby="couse-tab">
                        <div class="row">
                            <div class="col-md-3 col-sm-6 course-item">
                                <div class="course-item-body button">
                                    <label>The course you have signed up for:</label>
                                    <p>0</p>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 course-item">
                                <div class="course-item-body button">
                                    <label>End of the course:</label>
                                    <p>0</p>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 course-item">
                                <div class="course-item-body button">
                                    <label>Passed Course:</label>
                                    <p>0</p>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 course-item">
                                <div class="course-item-body button">
                                    <label>Failed Course:</label>
                                    <p>0</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tests-tab-panel" role="tabpanel" aria-labelledby="tests-tab">
                        test panel
                    </div>
                    <div class="tab-pane fade" id="subscription-tab-panel" role="tabpanel" aria-labelledby="subscription-tab">
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
<script>
$(document).ready(function() {
    console.log("profile page init!");

    $("#myTab").find(".nav-link").on("click", function(event){
        event.preventDefault();
        $("#myTab").find(".nav-link").removeClass("active");
        $(this).addClass("active");
        let target = $(this).data("target");
        $("#myTabContent").find(".tab-pane").removeClass("show");
        $("#myTabContent").find(".tab-pane").removeClass("active");
        $("#"+target+"-tab-panel").addClass("show");
        $("#"+target+"-tab-panel").addClass("active");
    });
});
</script>
@endsection