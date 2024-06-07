@extends('client.layout.app')

@section('title', 'Profile')
@section('custom_css')
<link href="{{asset('assets/chess-assets/css/profile.css')}}" rel="stylesheet">
<style>
.swal2-info {
    display: none !important;
}

.display-none{
    display: none!important;
}

.swal2-container small {
    font-size: 14px;
    color: #818182;
    font-weight: 600;
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
                    <img class="avatar-image" src="{{ asset('storage/avatars/'.Auth()->user()->avatar) }}" alt="" />
                    <div class="file btn btn-lg btn-primary">
                        Change Avatar
                        <input type="file" name="file" class="btn-change-image" />
                    </div>
                </div>
                <div class="profile-btn-bar display-flex justify-content-center display-none">
                    <a class="button button-small upload-image" style="margin-top: 0; font-size: 12px; padding: 0 10px!important">upload</a>
                </div>
                <div class="profile-work row">
                    <div class="col-md-12 col-sm-12 info-item-bar">
                        <div class="info-item">
                            <p>USER NAME</p>
                            <a href="">{{ @$user->user_name }}</a><br />
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 info-item-bar">
                        <div class="info-item">
                            <p>EMAIL</p>
                            <a href="">{{ @$user->email }}</a><br />
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 info-item-bar">
                        <div class="info-item">
                            <p>NCS COIN</p>
                            <a href="">{{ @$user->ncs_coin }}</a><br />
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
                    <div class="proile-rating display-flex align-items-flex-end justify-content-space-between position-relative"
                        style="margin-top: 0;">
                        <a href="#" class="button button-small btn-buy-ncs">BUY NCS</a>
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
                            <a class="nav-link" data-target="package-log" id="package-log-tab" data-toggle="tab"
                                href="#package-log" role="tab" aria-controls="package-log-panel"
                                aria-selected="false">Package Purchase Log</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-target="ncs-log" id="ncs-log-tab" data-toggle="tab" href="#ncs-log"
                                role="tab" aria-controls="ncs-log-panel" aria-selected="false">Ncs Purchase Log</a>
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
                                    <p>{{ isset($all_course) ? count($all_course) : 0 }}</p>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 course-item">
                                <div class="course-item-body button">
                                    <label>End of the course:</label>
                                    <p>{{ isset($end_of_course) ? $end_of_course : 0 }}</p>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 course-item">
                                <div class="course-item-body button">
                                    <label>Passed Course:</label>
                                    <p>{{ isset($permit_end_row) ? count($permit_end_row) : 0 }}</p>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 course-item">
                                <div class="course-item-body button">
                                    <label>Failed Course:</label>
                                    <p>{{ isset($failed_row) ? count($failed_row) : 0 }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="subscription-tab-panel" role="tabpanel"
                        aria-labelledby="subscription-tab">
                        <div class="table-responsive">


                            <table class="table table-bordred table-striped">

                                <thead>
                                    <th>Name</th>
                                    <th class="text-center">Started Time</th>
                                    <th class="text-center">Result</th>
                                    <th class="text-center">Deadline time</th>
                                    <th class="text-center">Extension</th>
                                </thead>
                                <tbody class="user-subscription-list">
                                    @foreach ($all_course as $course)
                                    <tr>
                                        <td
                                            class="text-left {{ $course->id == @$purchase_course->id ? 'background-blue color-white' : '' }}">
                                            {{@$course->Service->title}}</td>
                                        <td class="text-center">{{date( "Y-m-d", strtotime($course->created_at) )}}</td>
                                        @php
                                        $badge_text = "progressing";
                                        $badge_color = "background-brand";
                                        if($course->result == 1){
                                        $badge_text = "passed";
                                        $badge_color = "background-green";
                                        }
                                        if($course->status == 2){
                                        $badge_text = "failed";
                                        $badge_color = "background-red";
                                        }
                                        @endphp
                                        <td class="text-center"><span
                                                class="badge {{$badge_color}} color-white">{{$badge_text}}</span></td>
                                        <td class="text-center permit-period-time  ">
                                            {{date( "Y-m-d", strtotime($course->permit_period) )}}</td>
                                        <td class="text-center">
                                            <a data-course-id="{{$course->course_id}}"
                                                class="button button-small btn-upgrade-deadline"><i
                                                    class="fa fa-calendar"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="package-log-tab-panel" role="tabpanel" aria-labelledby="setting-tab">
                        <div class="table-responsive">
                            <table class="table table-bordred table-striped">

                                <thead>
                                    <th>Name</th>
                                    <th class="text-center">Purchased Time</th>
                                    <th class="text-center">Payment Type</th>
                                    <th class="text-center">Payment Amount</th>
                                </thead>
                                <tbody class="user-subscription-list">
                                    @foreach ($package_histories as $history)
                                    <tr>
                                        <td class="text-left">{{@$history->Service->title}}</td>
                                        <td class="text-center">
                                            {{date( "Y-m-d H:i:s", strtotime($history->created_at) )}}</td>
                                        <td class="text-center ">{{$history->currency}}</td>
                                        <td class="text-center">{{$history->amount}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="ncs-log-tab-panel" role="tabpanel" aria-labelledby="setting-tab">
                        <div class="table-responsive">
                            <table class="table table-bordred table-striped">

                                <thead>
                                    <th>Name</th>
                                    <th class="text-center">Purchased Time</th>
                                    <th class="text-center">Payment Type</th>
                                    <th class="text-center">Payment Amount</th>
                                </thead>
                                <tbody class="user-subscription-list">
                                    @foreach ($ncs_histories as $history)
                                    <tr>
                                        <td class="text-left">{{@$history->ncs_amount}} NCS</td>
                                        <td class="text-center">
                                            {{date( "Y-m-d H:i:s", strtotime($history->created_at) )}}</td>
                                        <td class="text-center">{{$history->currency}}</td>
                                        <td class="text-center">{{$history->payment_amount}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="setting-tab-panel" role="tabpanel" aria-labelledby="setting-tab">
                        setting panel
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@include("client.components.sweet-html")
@endsection

@section('custom_js')

<script>
toastr.options = {
    closeButton: false,
    debug: false,
    newestOnTop: false,
    progressBar: false,
    positionClass: "toast-top-right",
    preventDuplicates: false,
    onclick: null,
    showDuration: "300",
    hideDuration: "1000",
    timeOut: "5000",
    extendedTimeOut: "1000",
    showEasing: "swing",
    hideEasing: "linear",
    showMethod: "fadeIn",
    hideMethod: "fadeOut",
};

function getAllSubscription() {
    let formData = new FormData();
    formData.append('_token', '{{csrf_token()}}');
    sendRequest('{{route("profile.sub_all")}}', formData, function(data) {
        if (data.length > 0) {
            data.map((item, index) => {
                console.log(index);
                let html = '<tr> \n' +
                    '<td class="text-left"></td>' +
                    '<td class="text-center"></td>' +
                    '<td class="text-center"><span class="badge color-white"></span></td>' +
                    '<td class="text-center " ></td>' +
                    '<td class="text-center">' +
                    '<a class="button button-small btn-upgrade-deadline"><i class="fa fa-calendar"></i></a>' +
                    '</td>' +
                    '</tr>';
            });
        }
    }, function(code) {

    });
}

function purchaseAlarm(alarm_html) {
    swal({
            title: 'Course Purchasing',
            type: 'info',
            class: 'Course-Purchasing-alarm',
            html: alarm_html,
            showCancelButton: true,
            confirmButtonText: 'Yes, Do it!',
            confirmButtonClass: 'button',
            cancelButtonText: 'No, cancel!',
            confirmButtonClass: 'button button-small',
            cancelButtonClass: 'button button-small',
            confirmButtonColor: "",
            cancelButtonColor: ""
        })
        .then((result) => {
            if (result.value) {
                let course_id = $(".purchase-course-id").data('course-id');

                let formData = new FormData();
                formData.append('_token', '{{csrf_token()}}');
                formData.append('course_id', course_id);
                sendRequest('{{route("course.purchase")}}', formData, function(data) {
                    // getAllSubscription();+1
                    swal({
                        title: 'Purchase Successful!',
                        text: 'thank you.',
                        type: 'info',
                        class: 'Course-Purchasing-success-alarm',
                        html: alarm_html,
                        showCancelButton: false,
                        confirmButtonText: 'okay',
                        confirmButtonClass: 'button button-small',
                        confirmButtonColor: "",
                        cancelButtonColor: ""
                    }).then((result) => {
                        if (result.value) {
                            location.reload();
                        }
                    });
                }, function(code) {
                    if (code == "40") {
                        swal({
                            title: 'Purchase Failed!',
                            text: 'Excuse me, You have not enuough coin.',
                            type: 'warning',
                            class: 'Course-Purchasing-success-alarm',
                            showCancelButton: false,
                            confirmButtonText: 'okay',
                            confirmButtonClass: 'button button-small',
                            confirmButtonColor: "",
                            cancelButtonColor: ""
                        });
                    }
                })
            }
        });
}

$(document).ready(function() {

    console.log("profile page init!");

    $('.btn-change-image').change(function() {
        var input = this;
        $(".profile-btn-bar").removeClass("display-none");
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('.avatar-image').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    });

    $('.upload-image').click(function() {
        var formData = new FormData();
        formData.append('_token', _token);
        formData.append('avatar', $('.btn-change-image')[0].files[0]);

        $.ajax({
            url: '/upload-avatar',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                console.log('Image uploaded successfully');
                toastr.success("Image uploaded successfully.");
                // Handle success response
                location.reload();
            },
            error: function(xhr, status, error) {
                console.error('Error uploading image:', error);
                toastr.success("Error uploading image: ");
                // Handle error response
            }
        });
    });

    let check_course = localStorage.getItem("check-course");

    localStorage.setItem("check-course", 1);
    let page_type = "{{$type}}";

    if (page_type == "subscription") {
        $("#myTab").find(".nav-link").removeClass("active");
        $("#subscription-tab").addClass("active");
        $("#myTabContent").find(".tab-pane").removeClass("show");
        $("#myTabContent").find(".tab-pane").removeClass("active");
        $("#subscription-tab-panel").addClass("show");
        $("#subscription-tab-panel").addClass("active");

        if (check_course == 0) {
            var alarm_html =
                '<small>{{$current_deadline ? "Current deadline: " . $current_deadline : ""}}</small><br><small>Deadline by purchasing: {{@$purchase_deadline}}</small><br><small>Price: {{@$course->Service->price}} NCS</small><br><input hidden class="purchase-course-id" type="text" data-course-id="{{@$purchase_course_id}}">';
            purchaseAlarm(alarm_html);
        }

    }

    $(".btn-upgrade-deadline").on("click", function(e) {
        e.preventDefault();
        let course_id = $(this).data("course-id");
        if (course_id == null) {
            return false;
        }
        window.location.href = "/course/" + course_id;
    });

    $(".btn-buy-ncs").on("click", function(e) {
        e.preventDefault();
        swal({
                title: 'NCS Purchasing',
                type: 'info',
                html: '<input type="text" name="email" class="small-input ncs-purchasing-value" placeholder="Input Value" required="required" value="0" >',
                showCancelButton: true,
                confirmButtonText: 'Yes, Do it!',
                confirmButtonClass: 'button',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'button button-small',
                cancelButtonClass: 'button button-small',
                confirmButtonColor: "",
                cancelButtonColor: ""
            })
            .then((result) => {
                if (result.value) {
                    let amount = $(".ncs-purchasing-value").val().trim();
                    amount = Math.abs(amount);
                    if (amount < 1) {
                        return false;
                    }
                    window.location.href = "stripe/checkout?ncs=" + amount;
                }
            });
    });



});
</script>
@endsection