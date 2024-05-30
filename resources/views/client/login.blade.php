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
                        <input name="email" class="requestUsername" type="email" placeholder="Enter your email" required />
                        <i class="uil uil-envelope-alt email"></i>
                    </div>
                    @error('email')
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
                                                    <input type="text" name="your_email" id="your_email"
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
                                                <label class="special-label" for="country">Country:</label>
                                                <select id="country" name="country" class="form-control">
                                                    <option value="Afghanistan">Afghanistan</option>
                                                    <option value="Åland Islands">Åland Islands</option>
                                                    <option value="Albania">Albania</option>
                                                    <option value="Algeria">Algeria</option>
                                                    <option value="American Samoa">American Samoa</option>
                                                    <option value="Andorra">Andorra</option>
                                                    <option value="Angola">Angola</option>
                                                    <option value="Anguilla">Anguilla</option>
                                                    <option value="Antarctica">Antarctica</option>
                                                    <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                                    <option value="Argentina">Argentina</option>
                                                    <option value="Armenia">Armenia</option>
                                                    <option value="Aruba">Aruba</option>
                                                    <option value="Australia">Australia</option>
                                                    <option value="Austria">Austria</option>
                                                    <option value="Azerbaijan">Azerbaijan</option>
                                                    <option value="Bahamas">Bahamas</option>
                                                    <option value="Bahrain">Bahrain</option>
                                                    <option value="Bangladesh">Bangladesh</option>
                                                    <option value="Barbados">Barbados</option>
                                                    <option value="Belarus">Belarus</option>
                                                    <option value="Belgium">Belgium</option>
                                                    <option value="Belize">Belize</option>
                                                    <option value="Benin">Benin</option>
                                                    <option value="Bermuda">Bermuda</option>
                                                    <option value="Bhutan">Bhutan</option>
                                                    <option value="Bolivia">Bolivia</option>
                                                    <option value="Bosnia and Herzegovina">Bosnia and Herzegovina
                                                    </option>
                                                    <option value="Botswana">Botswana</option>
                                                    <option value="Bouvet Island">Bouvet Island</option>
                                                    <option value="Brazil">Brazil</option>
                                                    <option value="British Indian Ocean Territory">British Indian Ocean
                                                        Territory</option>
                                                    <option value="Brunei Darussalam">Brunei Darussalam</option>
                                                    <option value="Bulgaria">Bulgaria</option>
                                                    <option value="Burkina Faso">Burkina Faso</option>
                                                    <option value="Burundi">Burundi</option>
                                                    <option value="Cambodia">Cambodia</option>
                                                    <option value="Cameroon">Cameroon</option>
                                                    <option value="Canada">Canada</option>
                                                    <option value="Cape Verde">Cape Verde</option>
                                                    <option value="Cayman Islands">Cayman Islands</option>
                                                    <option value="Central African Republic">Central African Republic
                                                    </option>
                                                    <option value="Chad">Chad</option>
                                                    <option value="Chile">Chile</option>
                                                    <option value="China">China</option>
                                                    <option value="Christmas Island">Christmas Island</option>
                                                    <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands
                                                    </option>
                                                    <option value="Colombia">Colombia</option>
                                                    <option value="Comoros">Comoros</option>
                                                    <option value="Congo">Congo</option>
                                                    <option value="Congo, The Democratic Republic of The">Congo, The
                                                        Democratic Republic of The</option>
                                                    <option value="Cook Islands">Cook Islands</option>
                                                    <option value="Costa Rica">Costa Rica</option>
                                                    <option value="Cote D'ivoire">Cote D'ivoire</option>
                                                    <option value="Croatia">Croatia</option>
                                                    <option value="Cuba">Cuba</option>
                                                    <option value="Cyprus">Cyprus</option>
                                                    <option value="Czech Republic">Czech Republic</option>
                                                    <option value="Denmark">Denmark</option>
                                                    <option value="Djibouti">Djibouti</option>
                                                    <option value="Dominica">Dominica</option>
                                                    <option value="Dominican Republic">Dominican Republic</option>
                                                    <option value="Ecuador">Ecuador</option>
                                                    <option value="Egypt">Egypt</option>
                                                    <option value="El Salvador">El Salvador</option>
                                                    <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                    <option value="Eritrea">Eritrea</option>
                                                    <option value="Estonia">Estonia</option>
                                                    <option value="Ethiopia">Ethiopia</option>
                                                    <option value="Falkland Islands (Malvinas)">Falkland Islands
                                                        (Malvinas)</option>
                                                    <option value="Faroe Islands">Faroe Islands</option>
                                                    <option value="Fiji">Fiji</option>
                                                    <option value="Finland">Finland</option>
                                                    <option value="France">France</option>
                                                    <option value="French Guiana">French Guiana</option>
                                                    <option value="French Polynesia">French Polynesia</option>
                                                    <option value="French Southern Territories">French Southern
                                                        Territories</option>
                                                    <option value="Gabon">Gabon</option>
                                                    <option value="Gambia">Gambia</option>
                                                    <option value="Georgia">Georgia</option>
                                                    <option value="Germany">Germany</option>
                                                    <option value="Ghana">Ghana</option>
                                                    <option value="Gibraltar">Gibraltar</option>
                                                    <option value="Greece">Greece</option>
                                                    <option value="Greenland">Greenland</option>
                                                    <option value="Grenada">Grenada</option>
                                                    <option value="Guadeloupe">Guadeloupe</option>
                                                    <option value="Guam">Guam</option>
                                                    <option value="Guatemala">Guatemala</option>
                                                    <option value="Guernsey">Guernsey</option>
                                                    <option value="Guinea">Guinea</option>
                                                    <option value="Guinea-bissau">Guinea-bissau</option>
                                                    <option value="Guyana">Guyana</option>
                                                    <option value="Haiti">Haiti</option>
                                                    <option value="Heard Island and Mcdonald Islands">Heard Island and
                                                        Mcdonald Islands</option>
                                                    <option value="Holy See (Vatican City State)">Holy See (Vatican City
                                                        State)</option>
                                                    <option value="Honduras">Honduras</option>
                                                    <option value="Hong Kong">Hong Kong</option>
                                                    <option value="Hungary">Hungary</option>
                                                    <option value="Iceland">Iceland</option>
                                                    <option value="India">India</option>
                                                    <option value="Indonesia">Indonesia</option>
                                                    <option value="Iran, Islamic Republic of">Iran, Islamic Republic of
                                                    </option>
                                                    <option value="Iraq">Iraq</option>
                                                    <option value="Ireland">Ireland</option>
                                                    <option value="Isle of Man">Isle of Man</option>
                                                    <option value="Israel">Israel</option>
                                                    <option value="Italy">Italy</option>
                                                    <option value="Jamaica">Jamaica</option>
                                                    <option value="Japan">Japan</option>
                                                    <option value="Jersey">Jersey</option>
                                                    <option value="Jordan">Jordan</option>
                                                    <option value="Kazakhstan">Kazakhstan</option>
                                                    <option value="Kenya">Kenya</option>
                                                    <option value="Kiribati">Kiribati</option>
                                                    <option value="Korea, Democratic People's Republic of">Korea,
                                                        Democratic People's Republic of</option>
                                                    <option value="Korea, Republic of">Korea, Republic of</option>
                                                    <option value="Kuwait">Kuwait</option>
                                                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                    <option value="Lao People's Democratic Republic">Lao People's
                                                        Democratic Republic</option>
                                                    <option value="Latvia">Latvia</option>
                                                    <option value="Lebanon">Lebanon</option>
                                                    <option value="Lesotho">Lesotho</option>
                                                    <option value="Liberia">Liberia</option>
                                                    <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya
                                                    </option>
                                                    <option value="Liechtenstein">Liechtenstein</option>
                                                    <option value="Lithuania">Lithuania</option>
                                                    <option value="Luxembourg">Luxembourg</option>
                                                    <option value="Macao">Macao</option>
                                                    <option value="Macedonia, The Former Yugoslav Republic of">
                                                        Macedonia, The Former Yugoslav Republic of</option>
                                                    <option value="Madagascar">Madagascar</option>
                                                    <option value="Malawi">Malawi</option>
                                                    <option value="Malaysia">Malaysia</option>
                                                    <option value="Maldives">Maldives</option>
                                                    <option value="Mali">Mali</option>
                                                    <option value="Malta">Malta</option>
                                                    <option value="Marshall Islands">Marshall Islands</option>
                                                    <option value="Martinique">Martinique</option>
                                                    <option value="Mauritania">Mauritania</option>
                                                    <option value="Mauritius">Mauritius</option>
                                                    <option value="Mayotte">Mayotte</option>
                                                    <option value="Mexico">Mexico</option>
                                                    <option value="Micronesia, Federated States of">Micronesia,
                                                        Federated States of</option>
                                                    <option value="Moldova, Republic of">Moldova, Republic of</option>
                                                    <option value="Monaco">Monaco</option>
                                                    <option value="Mongolia">Mongolia</option>
                                                    <option value="Montenegro">Montenegro</option>
                                                    <option value="Montserrat">Montserrat</option>
                                                    <option value="Morocco">Morocco</option>
                                                    <option value="Mozambique">Mozambique</option>
                                                    <option value="Myanmar">Myanmar</option>
                                                    <option value="Namibia">Namibia</option>
                                                    <option value="Nauru">Nauru</option>
                                                    <option value="Nepal">Nepal</option>
                                                    <option value="Netherlands">Netherlands</option>
                                                    <option value="Netherlands Antilles">Netherlands Antilles</option>
                                                    <option value="New Caledonia">New Caledonia</option>
                                                    <option value="New Zealand">New Zealand</option>
                                                    <option value="Nicaragua">Nicaragua</option>
                                                    <option value="Niger">Niger</option>
                                                    <option value="Nigeria">Nigeria</option>
                                                    <option value="Niue">Niue</option>
                                                    <option value="Norfolk Island">Norfolk Island</option>
                                                    <option value="Northern Mariana Islands">Northern Mariana Islands
                                                    </option>
                                                    <option value="Norway">Norway</option>
                                                    <option value="Oman">Oman</option>
                                                    <option value="Pakistan">Pakistan</option>
                                                    <option value="Palau">Palau</option>
                                                    <option value="Palestinian Territory, Occupied">Palestinian
                                                        Territory, Occupied</option>
                                                    <option value="Panama">Panama</option>
                                                    <option value="Papua New Guinea">Papua New Guinea</option>
                                                    <option value="Paraguay">Paraguay</option>
                                                    <option value="Peru">Peru</option>
                                                    <option value="Philippines">Philippines</option>
                                                    <option value="Pitcairn">Pitcairn</option>
                                                    <option value="Poland">Poland</option>
                                                    <option value="Portugal">Portugal</option>
                                                    <option value="Puerto Rico">Puerto Rico</option>
                                                    <option value="Qatar">Qatar</option>
                                                    <option value="Reunion">Reunion</option>
                                                    <option value="Romania">Romania</option>
                                                    <option value="Russian Federation">Russian Federation</option>
                                                    <option value="Rwanda">Rwanda</option>
                                                    <option value="Saint Helena">Saint Helena</option>
                                                    <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                                    <option value="Saint Lucia">Saint Lucia</option>
                                                    <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon
                                                    </option>
                                                    <option value="Saint Vincent and The Grenadines">Saint Vincent and
                                                        The Grenadines</option>
                                                    <option value="Samoa">Samoa</option>
                                                    <option value="San Marino">San Marino</option>
                                                    <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                                    <option value="Saudi Arabia">Saudi Arabia</option>
                                                    <option value="Senegal">Senegal</option>
                                                    <option value="Serbia">Serbia</option>
                                                    <option value="Seychelles">Seychelles</option>
                                                    <option value="Sierra Leone">Sierra Leone</option>
                                                    <option value="Singapore">Singapore</option>
                                                    <option value="Slovakia">Slovakia</option>
                                                    <option value="Slovenia">Slovenia</option>
                                                    <option value="Solomon Islands">Solomon Islands</option>
                                                    <option value="Somalia">Somalia</option>
                                                    <option value="South Africa">South Africa</option>
                                                    <option value="South Georgia and The South Sandwich Islands">South
                                                        Georgia and The South Sandwich Islands</option>
                                                    <option value="Spain">Spain</option>
                                                    <option value="Sri Lanka">Sri Lanka</option>
                                                    <option value="Sudan">Sudan</option>
                                                    <option value="Suriname">Suriname</option>
                                                    <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen
                                                    </option>
                                                    <option value="Swaziland">Swaziland</option>
                                                    <option value="Sweden">Sweden</option>
                                                    <option value="Switzerland">Switzerland</option>
                                                    <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                                    <option value="Taiwan">Taiwan</option>
                                                    <option value="Tajikistan">Tajikistan</option>
                                                    <option value="Tanzania, United Republic of">Tanzania, United
                                                        Republic of</option>
                                                    <option value="Thailand">Thailand</option>
                                                    <option value="Timor-leste">Timor-leste</option>
                                                    <option value="Togo">Togo</option>
                                                    <option value="Tokelau">Tokelau</option>
                                                    <option value="Tonga">Tonga</option>
                                                    <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                                    <option value="Tunisia">Tunisia</option>
                                                    <option value="Turkey">Turkey</option>
                                                    <option value="Turkmenistan">Turkmenistan</option>
                                                    <option value="Turks and Caicos Islands">Turks and Caicos Islands
                                                    </option>
                                                    <option value="Tuvalu">Tuvalu</option>
                                                    <option value="Uganda">Uganda</option>
                                                    <option value="Ukraine">Ukraine</option>
                                                    <option value="United Arab Emirates">United Arab Emirates</option>
                                                    <option value="United Kingdom">United Kingdom</option>
                                                    <option value="United States">United States</option>
                                                    <option value="United States Minor Outlying Islands">United States
                                                        Minor Outlying Islands</option>
                                                    <option value="Uruguay">Uruguay</option>
                                                    <option value="Uzbekistan">Uzbekistan</option>
                                                    <option value="Vanuatu">Vanuatu</option>
                                                    <option value="Venezuela">Venezuela</option>
                                                    <option value="Viet Nam">Viet Nam</option>
                                                    <option value="Virgin Islands, British">Virgin Islands, British
                                                    </option>
                                                    <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                                    <option value="Wallis and Futuna">Wallis and Futuna</option>
                                                    <option value="Western Sahara">Western Sahara</option>
                                                    <option value="Yemen">Yemen</option>
                                                    <option value="Zambia">Zambia</option>
                                                    <option value="Zimbabwe">Zimbabwe</option>
                                                </select>
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
                                                    <input type="text" class="form-control" id="user-password"
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

                if(sendData["firstName"] != "" && sendData["lastName"] != "" && sendData["birthday"] != "" && sendData["email"] != "" && sendData["phoneNumber"] != "" && sendData["country"] != ""){
                    event.preventDefault();
                    let formData = new FormData();
                    formData.append('_token', _token);
                    formData.append('age', sendData["age"]);
                    formData.append('firstName', sendData["firstName"]);
                    formData.append('lastName', sendData["lastName"]);
                    formData.append('birthday', sendData["birthday"]);
                    formData.append('email', sendData["email"]);
                    formData.append('phoneNumber', sendData["phoneNumber"]);
                    formData.append('country', sendData["country"]);

                    sendRequest("{{route('login.email.check')}}",formData, function(data){
                        $(".btn-twice-step").removeClass("email-check");
                        $("#form-total-t-2").trigger("click");
                    }, function(code){
                        if(code == "17"){
                            toastr.warning("EMAIL REGISTRATION REPEATED!");   
                        }

                        if(code == "20"){
                            toastr.warning("EMAIL VERIFICATION FAILURE!");   
                        }
                    });

                }

                let setsendData = JSON.stringify(sendData);
                localStorage.setItem("sendData", setsendData);
                
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

            if (email == null || suserName == null || spassword == null) {
                toastr.warning("Something went wrong!");
                return false;
            }

            let formData = new FormData();
            formData.append('_token', _token);
            formData.append('email', email);
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