<!DOCTYPE html>
<!-- Coding by CodingLab || www.codinglabweb.com -->
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Website with Login & Registration Form</title>

    <link rel="stylesheet" type="text/css" href="assets/chess-assets/login/signup/css/opensans-font.css">
    <link rel="stylesheet" type="text/css"
        href="assets/chess-assets/login/signup/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
    <!-- Main Style Css -->
    <link rel="stylesheet" href="assets/chess-assets/login/signup/css/style.css" />

    <link rel="stylesheet" href="assets/chess-assets/login/signin/style.css" />
    <!-- Unicons -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />

    <link rel="stylesheet" href="assets/datepicker/daterangepicker.css" />
    <link rel="stylesheet" href="assets/datepicker/custom.css" />
    <link rel="stylesheet" href="assets/toastr/toastr.css" />
    <style>
    .actions.clearfix {
        display: none !important;
    }

    .login_signup {
        padding-bottom: 2rem;
    }

    .md-country-picker-item {
        position: relative;
        line-height: 20px;
        padding: 10px 0 10px 40px;
    }

    .md-country-picker-flag {
        position: absolute;
        left: 0;
        height: 20px;
    }

    .mbsc-scroller-wheel-item-2d .md-country-picker-item {
        transform: scale(1.1);
    }
    </style>
</head>

<body>
    <!-- Header -->
    <!-- <header class="header">
      <nav class="nav">
        <a href="/" class="nav_logo" style="#505050">NetworkChessSchool</a>
      </nav>
    </header> -->

    <!-- Home -->
    <section class="home">
        <div class="form_container" style="display: flex; justify-content: center; align-items: center;">
            <!-- <i class="uil uil-times form_close"></i> -->
            <!-- Login From -->
            <div class="form login_form">
                <form action="{{route('login.request')}}" method="POST">
                    @csrf
                    <h2>Login</h2>

                    <div class="input_box">
                        <input name="identity" class="requestUsername" type="text" placeholder="Enter your email or username" required />
                        <i class="uil uil-envelope-alt email"></i>
                    </div>
                    @error('identity')
                        <a href="#" class="forgot_pw" style="text-decoration: none;">{{$message}}</a>
                    @enderror
                    <div class="input_box">
                        <input name="password" class="requestPassword" type="password" placeholder="Enter your password" required />
                        <i class="uil uil-lock password"></i>
                        <i class="uil uil-eye-slash pw_hide"></i>
                    </div>
                    @error('password')
                        <a href="#" class="forgot_pw" style="text-decoration: none;">{{$message}}</a>
                    @enderror
                    @if(Session::has('password_incorrect'))
                        <a href="#" style="text-decoration: none; color: red!important;" class="text-danger">{{ Session::get('password_incorrect') }}</a>
                    @endif

                    <div class="option_field">
                        <div class="checkbox-bar">
                            <span class="checkbox">
                                <input type="checkbox" id="check" />
                                <label for="check">Remember me</label>
                            </span>
                        </div>
                        <a href="#" class="forgot_pw">Forgot password?</a>
                    </div>

                    <div class="login-btn-bar">
                        <button class="my-custom-button home-button" style="margin-right: 8px;">Home</button>
                        <button class="my-custom-button login-button">Login</button>
                    </div>

                    <div class="login_signup">Don't have an account? <a href="#" id="signup">Signup</a></div>
                </form>
            </div>

            <!-- Signup From -->
            <div class="form signup_form" style="position: absolute;transition: all 0.4s ease-out;">
                <div class="form form-v1-content" style="transition: all 0.4s ease-out;">
                    <div class="wizard-form">
                        <form class="form-register">
                            <div id="form-total">
                                <!-- SECTION 3 -->
                                <h2 class="step-title-0">
                                    <p class="step-icon"><span>01</span></p>
                                    <span class="step-text">Select Age</span>
                                </h2>
                                <section>
                                    <div class="inner">
                                        <div class="wizard-header">
                                            <h3 class="heading">Select Age</h3>
                                            <p>Please select your age.</p>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-holder form-holder-2">
                                                <input type="radio" class="radio" name="radio1" id="plan-1"
                                                    value="plan-1">
                                                <label class="plan-icon plan-1-label" for="plan-1">
                                                    <img src="assets/chess-assets/login/signup/images/form-v1-icon-2.png"
                                                        alt="pay-1">
                                                </label>
                                                <div class="plan-total">
                                                    <span class="plan-title">Children</span>
                                                    <p class="plan-text">Basic Education</p>
                                                </div>
                                                <input type="radio" class="radio" name="radio1" id="plan-2"
                                                    value="plan-2">
                                                <label class="plan-icon plan-2-label" for="plan-2">
                                                    <img src="assets/chess-assets/login/signup/images/form-v1-icon-2.png"
                                                        alt="pay-1">
                                                </label>
                                                <div class="plan-total">
                                                    <span class="plan-title">Adult</span>
                                                    <p class="plan-text">High Education</p>
                                                </div>
                                                <div class="button-bar" style="text-align: right;">
                                                    <button data-parent-index="0"
                                                        class="btn-twice-step my-custom-button pass-good next-button email-check">Next<i
                                                            class="uil uil-arrow-right"></i></button>
                                                </div>
                                            </div>
                                </section>
                                <!-- SECTION 1 -->
                                <h2 class="step-title-1 disable">
                                    <p class="step-icon"><span>02</span></p>
                                    <span class="step-text">Peronal Infomation</span>
                                </h2>
                                <section>
                                    <div class="inner">
                                        <div class="wizard-header">
                                            <h3 class="heading">Peronal Infomation</h3>
                                            <p>Please enter your infomation and proceed to the next step so we can build
                                                your accounts. </p>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-holder">
                                                <fieldset>
                                                    <legend>First Name</legend>
                                                    <input type="text" class="form-control" id="first-name"
                                                        name="first-name" placeholder="First Name" required>
                                                </fieldset>
                                            </div>
                                            <div class="form-holder">
                                                <fieldset>
                                                    <legend>Last Name</legend>
                                                    <input type="text" class="form-control" id="last-name"
                                                        name="last-name" placeholder="Last Name" required>
                                                </fieldset>
                                            </div>
                                        </div>
                                        <div class="form-row form-row-date">
                                            <div class="form-holder form-holder-2">
                                                <fieldset>
                                                    <legend>Birth Date</legend>
                                                    <input class="input--style-2 js-datepicker" id="my_birthdate"
                                                        type="text" placeholder="Birthdate" name="birthday">
                                                </fieldset>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-holder form-holder-2">
                                                <fieldset>
                                                    <legend>Your Email</legend>
                                                    <input type="email" name="your_email" id="your_email"
                                                        class="form-control" pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}"
                                                        placeholder="example@email.com" required>
                                                </fieldset>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-holder form-holder-2">
                                                <fieldset>
                                                    <legend>Phone Number</legend>
                                                    <input type="text" class="form-control" id="phone" name="phone"
                                                        placeholder="+1 888-999-7777" required>
                                                </fieldset>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-holder form-holder-2">
                                                <fieldset>
                                                        <legend>Country</legend>
                                                        @include('client.components.country')
                                                </fieldset>
                                            </div>
                                        </div>
                                        <div class="button-bar" style="text-align: right;">
                                            <button data-parent-index="1"
                                                class="my-custom-button pass-good prev-button"><i
                                                    class="uil uil-arrow-left"
                                                    style="padding-right: 5px;"></i>Prev</button>
                                            <button data-parent-index="1"
                                                class="my-custom-button pass-good next-button">Next<i
                                                    class="uil uil-arrow-right" style="padding-left: 5px;"></i></button>
                                        </div>
                                    </div>
                                </section>
                                <!-- SECTION 2 -->
                                <h2 class="step-title-2 disable">
                                    <p class="step-icon"><span>03</span></p>
                                    <span class="step-text">Create Account</span>
                                </h2>
                                <section>
                                    <div class="inner">
                                        <div class="wizard-header">
                                            <h3 class="heading">Create Account</h3>
                                            <p>Enter username and password of your account.</p>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-holder form-holder-2">
                                                <fieldset>
                                                    <legend>UserName</legend>
                                                    <input type="text" class="form-control" id="user-name"
                                                        name="user-name" placeholder="User Name" required>
                                                </fieldset>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-holder form-holder-2">
                                                <fieldset>
                                                    <legend>Password</legend>
                                                    <input type="password" class="form-control" id="user-password"
                                                        name="user-password" placeholder="Enter Your Password" required>
                                                </fieldset>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-holder form-holder-2">
                                                <fieldset>
                                                    <legend>Confirm Password</legend>
                                                    <input type="password" class="form-control" id="confirm-password"
                                                        name="confirm-password" placeholder="Confirm Your Password"
                                                        required>
                                                </fieldset>
                                            </div>
                                        </div>
                                        <div class="button-bar" style="text-align: right;">
                                            <button data-parent-index="2"
                                                class="my-custom-button pass-good prev-button"><i
                                                    class="uil uil-arrow-left"
                                                    style="padding-right: 5px;"></i>Prev</button>
                                            <button data-parent-index="2"
                                                class="my-custom-button pass-good create-button">Create<i
                                                    class="uil uil-arrow-right" style="padding-left: 5px;"></i></button>
                                        </div>
                                    </div>
                                </section>

                                <div class="login_signup">Already have an account? <a href="#" id="login">Login</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <script src="assets/chess-assets/login/signup/js/jquery-3.3.1.min.js"></script>
    
    <script src="assets/toastr/toastr.min.js"></script>

    <script src="assets/custom/app.js"></script>

    <script src="assets/chess-assets/login/signup/js/main.js"></script>
    <script src="assets/chess-assets/login/signin/script.js"></script>
    <script src="assets/datepicker/moment.min.js"></script>
    <script src="assets/datepicker/daterangepicker.js"></script>

    <script>
    var _token = $('meta[name="csrf-token"]').attr('content');

    let sendData = {
        "age": null,
        "firstName": null,
        "lastName": null,
        "birthday": null,
        "email": null,
        "phoneNumber": null,
        "country": null,
        "userName": null,
        "password": null
    };

    let setsendData = JSON.stringify(sendData);
    localStorage.setItem("sendData", setsendData);
    localStorage.setItem("passCheck", "no");

    $(document).ready(function() {

        $(".plan-icon").on("click", function(){
            $(".plan-icon").css("background", "#999");
            $(this).css("background", "#4fab40");
            console.log("plan-icon click!");
        });

        $("#form-total-t-0").find(".step-icon").css("background", "#ff5722");

        //add Data
        $("#form-total-p-0").find("input").on("click", function() {
            let value = $(this).val();

            if (value == "plan-1") {
                sendData["age"] = "children";
            } else {
                sendData["age"] = "adult";
            }
            let setsendData = JSON.stringify(sendData);
            localStorage.setItem("sendData", setsendData);
        });


        $(".prev-button").on("click", function(event) {
            event.preventDefault();
            localStorage.setItem("passCheck", "ok");

            let index = $(this).data("parent-index");

            if (index == 1) {
                $("#form-total-t-0").trigger("click");
            }

            if (index == 2) {
                $("#form-total-t-1").trigger("click");
            }

        });

        //next event 
        $(".next-button").on("click", function(event) {

            localStorage.setItem("passCheck", "ok");

            let sendData = localStorage.getItem("sendData");
            sendData = JSON.parse(sendData);

            let index = $(this).data("parent-index");

            if (index == 0) {
                event.preventDefault();
                $("#form-total-t-1").trigger("click");
            }

            if (index == 1) {

                sendData["firstName"] = $("#first-name").val().trim();
                sendData["lastName"] = $("#last-name").val().trim();
                sendData["birthday"] = $("#my_birthdate").val().trim();
                sendData["email"] = $("#your_email").val().trim();
                sendData["phoneNumber"] = $("#phone").val().trim();
                sendData["country"] = $("#country").val().trim();

                if(sendData["birthday"] == null || sendData["birthday"] == undefined || sendData["birthday"] == ""){
                    $("#my_birthdate").closest("fieldset").css("border-color", "#ff5722");
                }

                // if(sendData["firstName"] != "" && sendData["lastName"] != "" && sendData["birthday"] != "" && sendData["email"] != "" && sendData["phoneNumber"] != "" && sendData["country"] != ""){
                //     event.preventDefault();
                //     let formData = new FormData();
                //     sendRequest("{{route('login.email.check')}}",formData, function(data){
                //         $(".btn-twice-step").removeClass("email-check");
                //         $("#form-total-t-2").trigger("click");
                //     }, function(code){
                //         if(code == "17"){
                //             toastr.warning("EMAIL REGISTRATION REPEATED!");   
                //         }
                //         if(code == "20"){
                //             toastr.warning("EMAIL VERIFICATION FAILURE!");   
                //         }
                //     });
                // }

                if(sendData["firstName"] != "" && sendData["lastName"] != "" && sendData["birthday"] != "" && sendData["email"] != "" && sendData["phoneNumber"] != "" && sendData["country"] != ""){
                    event.preventDefault();    
                    let setsendData = JSON.stringify(sendData);
                    localStorage.setItem("sendData", setsendData);

                    $(".btn-twice-step").removeClass("email-check");
                    $("#form-total-t-2").trigger("click");
                }

            }

        });


        //create event
        $(".create-button").on("click", function(e) {

            e.preventDefault();

            let userName = $("#user-name").val().trim();
            let password = $("#user-password").val().trim();
            let cpassword = $("#confirm-password").val().trim();

            if (password != cpassword) {
                toastr.warning("Confirm your password");
                return false;
            }

            let curlData = localStorage.getItem("sendData");
            curlData = JSON.parse(curlData);

            curlData["userName"] = userName;
            curlData["password"] = password;

            let setData = JSON.stringify(curlData);
            localStorage.setItem("sendData", setData)

            let email = curlData['email'];
            let suserName = curlData['userName'];
            let spassword = curlData['password'];

            if (email == null || suserName == null || spassword == null || sendData["firstName"] == "" || sendData["lastName"] == "" || sendData["birthday"] == "" || sendData["email"] == "" || sendData["phoneNumber"] == "" || sendData["country"] == "") {
                toastr.warning("Something went wrong!");
                return false;
            }

            let formData = new FormData();
            formData.append('_token', _token);
            formData.append('age', curlData["age"]);
            formData.append('firstName', curlData["firstName"]);
            formData.append('lastName', curlData["lastName"]);
            formData.append('birthday', curlData["birthday"]);
            formData.append('email', curlData["email"]);
            formData.append('phoneNumber', curlData["phoneNumber"]);
            formData.append('country', curlData["country"]);
            formData.append('userName', userName);
            formData.append('password', password);

            sendRequest("{{route('login.register')}}", formData,
                function(data) {
                    $(".requestUsername").val(email);
                    toastr.success("Registraion was successful.");
                    $(".form_container").removeClass("active");
                },
                function(code) {
                    if(code == "15"){
                        toastr.warning("{{ __('messages.request_register_email_exist_error') }}");
                            return false;
                    }else{
                        toastr.warning("{{ __('messages.request_register_user_exist_error') }}");
                            return false;
                    }
                });

        });

        //go home
        $(".home-button").on("click", function(e){
            e.preventDefault();
            window.location.href = "{{route('index')}}";
        });

        $('.js-datepicker').daterangepicker({
            "singleDatePicker": true,
            "showDropdowns": true,
            "autoUpdateInput": false,
            locale: {
                format: 'YYYY-MM-DD'
            },
        });

        var myCalendar = $('.js-datepicker');
        var isClick = 0;

        $(window).on('click', function() {
            isClick = 0;
        });

        $(myCalendar).on('apply.daterangepicker', function(ev, picker) {
            isClick = 0;
            $(this).val(picker.startDate.format('YYYY-MM-DD'));

        });

        $('.js-btn-calendar').on('click', function(e) {
            e.stopPropagation();

            if (isClick === 1) isClick = 0;
            else if (isClick === 0) isClick = 1;

            if (isClick === 1) {
                myCalendar.focus();
            }
        });

        $(myCalendar).on('click', function(e) {
            e.stopPropagation();
            isClick = 1;
        });

        $('.daterangepicker').on('click', function(e) {
            e.stopPropagation();
        });
    });
    </script>

    <script src="assets/chess-assets/login/signup/js/jquery.steps.js"></script>
</body>

</html>