@extends('client.layout.app')

@section('title', 'Profile')
@section('custom_css')
<link href="{{asset('assets/chess-assets/css/profile.css')}}" rel="stylesheet">
<style>
.swal2-info {
    display: none !important;
}
</style>
@endsection
@section('content')
@include('client.components.body-header')
<div class="container emp-profile">
    <form method="post">
        <div class="row">
            <div class="col-md-4">
                <div class="profile-img">
                    <img src="{{asset('assets/chess-assets/img/avatar/teacher.jpg')}}" alt="" />
                    <div class="file btn btn-lg btn-primary">
                        Change Avatar
                        <input type="file" name="file" />
                    </div>
                </div>
                <div class="profile-work row">
                    <div class="col-md-6 col-sm-12 info-item-bar">
                        <div class="info-item">
                            <p>USER NAME</p>
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
                <div class="profile-head">
                    <h4>
                        {{ @$user->email }}
                    </h4>
                    <div class="score-bar">
                        <h1 class="ncs-coin-title color-yellow" style="font-size: 50px;">
                            <span data-value="{{ @$user->ncs_coin }}" class="coin-value">{{ @$user->ncs_coin }}<small
                                    style="color: #ff5722!important;">NCS</small></span>
                        </h1>
                    </div>
                    <div class="proile-rating display-flex align-items-flex-end justify-content-space-between position-relative"
                        style="margin-top: 0;">
                        <a href="#" class="button button-small btn-buy-ncs">Buy now</a>
                        <div class="position-absolute small-info"><i class="fa fa-info-circle"></i>( 1 * NCS = 10 * PLN
                            )</div>
                    </div>
                    <ul class="nav nav-tabs my-info-tabs" id="myTab" role="tablist" style="margin-top: 1rem;">
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
                <div class="tab-content profile-tab my-info-detail-panel" id="myTabContent">
                    <div class="tab-pane fade show active" id="couse-tab-panel" role="tabpanel"
                        aria-labelledby="couse-tab">
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

<script>
$(document).ready(function() {
    console.log("profile page init!");

    let page_type = "{{$type}}";

    if (page_type == "subscription") {
        $("#myTab").find(".nav-link").removeClass("active");
        $("#subscription-tab").addClass("active");
        $("#myTabContent").find(".tab-pane").removeClass("show");
        $("#myTabContent").find(".tab-pane").removeClass("active");
        $("#subscription-tab-panel").addClass("show");
        $("#subscription-tab-panel").addClass("active");
    }

    $(".btn-buy-ncs").on("click", function(e) {
        swal({
                title: 'NCS PURCHASING',
                type: 'info',
                html: '<input type="text" name="email" class="small-input ncs-purchasing-value" placeholder="Input Value" required="required" value="0" >',
                showCancelButton: true,

                confirmButtonColor: '#66cc99',
                cancelButtonColor: '#ff6666',
                confirmButtonText: 'Yes, Do it!',
                confirmButtonClass: 'button',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger'
            })
            .then((result) => {
                if (result.value) {
                    let amount = $(".ncs-purchasing-value").val().trim();
                    amount = Math.round(amount * 1);
                    amount = Math.abs(amount);
                    if (amount < 1) {
                        return false;
                    }

                    window.location.href = "stripe/checkout?ncs=" + amount;
                }
            });

        e.preventDefault();
    });
});
</script>
@endsection