@extends('client.layout.app')

@section('title', 'home')
@section('custom_css')
<style>
@keyframes rotateme {
    0% {
        -webkit-transform: rotate(0deg);
        transform: rotate(0deg);
    }

    100% {
        -webkit-transform: rotate(360deg);
        transform: rotate(360deg);
    }
}
</style>
@endsection
@section('content')
<!-- Start Slider Section -->
<header id="home" class="slider slider-prlx">
    <div class="swiper-container parallax-slider">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="bg-img valign" data-background="assets/chess-assets/img/home-slider/slider-1.png"
                    data-overlay-dark="5">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12  col-md-12">
                                <div class="caption">
                                    <h1>In the kingdom of chess, the knight is fast.<br>He rides a horse with a graceful
                                        drift.<br>With L-shaped movements, it jumps so slyly,<br>Grabbing enemies with a
                                        daring attempt.</h1>
                                    <div class="banner-btn home-slider-btn">
                                        <a href="{{route('login')}}" class="button mr-15">Sign Up For Courses</a>
                                        <a href="{{route('contact.index')}}" class="button-two">Contact Us</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="bg-img valign" data-background="assets/chess-assets/img/home-slider/slider-2.png"
                    data-overlay-dark="5">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12  col-md-12">
                                <div class="caption">
                                    <h1>Tower, tower high and strong, Guarding the board<br>all day long. In straight
                                        lines he moves<br>with power, Protecting the king with all his eyes.</h1>
                                    <div class="banner-btn home-slider-btn">
                                        <a href="{{route('login')}}" class="button mr-15">Sign Up For Courses</a>
                                        <a href="{{route('contact.index')}}" class="button-two">Contact Us</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="bg-img valign" data-background="assets/chess-assets/img/home-slider/slider-3.png"
                    data-overlay-dark="5">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12  col-md-12">
                                <div class="caption">
                                    <h1>The messenger moves diagonally into the distance,<br>Like a sneaky spy, he hides
                                        his real<br>scar. Black or white, he dances with joy,<br>Unpredictable
                                        movements, that's how he will be.</h1>
                                    <div class="banner-btn home-slider-btn">
                                        <a href="{{route('login')}}" class="button mr-15">Sign Up For Courses</a>
                                        <a href="{{route('contact.index')}}" class="button-two">Contact Us</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="bg-img valign" data-background="assets/chess-assets/img/home-slider/slider-4.png"
                    data-overlay-dark="5">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12  col-md-12">
                                <div class="caption">
                                    <h1>Queen, ruler, elegant and beautiful,<br>Wanders around the board without a care.
                                        With power and grace<br>in all directions, He is the heart of the game, the
                                        center<br>of feeling.</h1>
                                    <div class="banner-btn home-slider-btn">
                                        <a href="{{route('login')}}" class="button mr-15">Sign Up For Courses</a>
                                        <a href="{{route('contact.index')}}" class="button-two">Contact Us</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="bg-img valign" data-background="assets/chess-assets/img/home-slider/slider-5.png"
                    data-overlay-dark="5">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12  col-md-12">
                                <div class="caption">
                                    <h1>And finally the king, the one who must be defended,<br>cannot be moved much, but
                                        must understand.<br>Surrounded by pawns, he holds on tight,<br>Because if he
                                        falls, the game is lost, we found</h1>
                                    <div class="banner-btn home-slider-btn">
                                        <a href="{{route('login')}}" class="button mr-15">Sign Up For Courses</a>
                                        <a href="{{route('contact.index')}}" class="button-two">Contact Us</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- slider setting -->
        <div class="control-text">
            <div class="swiper-button-prev swiper-nav-ctrl prev-ctrl cursor-pointer">
                <span class="arrow prv"></span>
            </div>
            <div class="swiper-button-next swiper-nav-ctrl next-ctrl cursor-pointer">
                <span class="arrow nxt"></span>
            </div>
        </div>
        <div class="swiper-pagination"></div>
    </div>
</header>
<!-- End Slider Section -->

<!-- Start Service Section -->
@include('client.components.service')
<!-- End Service Section -->
<section id="about" class="about-area bg-grey">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-lg-6 col-md-12">
                <div class="about-image">
                    <img src="assets/chess-assets/img/about.jpg" alt="About image">
                </div>
            </div>
            <div class="col-lg-6 col-md-12 custom-padding">
                <div class="about-content">
                    <h2>An interactive guide to the Chesskid platform</h2>
                    <p class="fs-5 fw-normal custom-p col-md-6">Learning with ChessKid is fun! Play games, watch video
                        lessons and solve fun puzzles!</p>
                    <a href="https://www.chesskid.com/" class="button" style="margin-top: 0px!important">Join
                        Checsskid</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="faq-area section-padding" id="Davos_Special">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-md-12">
                <div class="section-title" style="margin-bottom: 30px">
                    <div class="sec-bubble">
                        <div class="bubble"></div>
                        <div class="bubble"></div>
                        <div class="bubble"></div>
                    </div>
                    <h2>Filmiki Wideo</h2>
                    <!-- <h4 class="mt-3 custom-p">Limousine Service During the Davos Meeting (January 20-24, 2025)</h4> -->
                </div>
            </div>
            <div class="col-lg-12 col-md-12 faq-item wow fadeInDown text-center" data-wow-delay="0.2s">
                <!-- <h4 class="custom-p">Chess Class is an online platform dedicated to providing high-quality chess education to students of all ages and skill levels. Our experienced instructors offer interactive lessons, tactical training and personalized coaching to help players improve their chess skills and reach their full potential. Whether you are a beginner looking to learn the basics or an advanced player seeking to master complex strategies, Chess Class has the resources and support you need to succeed in the game of chess. Join us today and take your chess game to the next level!</h4> -->
                <p class="custom-p">Chess Class is an online platform dedicated to providing high-quality chess
                    education to students of all ages and skill levels. Our experienced instructors offer interactive
                    lessons, tactical training and personalized coaching to help players improve their chess skills and
                    reach their full potential. Whether you are a beginner looking to learn the basics or an advanced
                    player seeking to master complex strategies, Chess Class has the resources and support you need to
                    succeed in the game of chess. Join us today and take your chess game to the next level!</p>
            </div>
        </div>
    </div>
</section>

<!-- Start Pricing Section -->
<section id="References" class="price-section section-padding" style="padding-top: 0px!important;">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 wow video-bar fadeInUp" data-wow-delay="0.2s">
                <div class="video-item">
                    <img src="assets/chess-assets/img/video-1.png">
                    <a href="#" class="iq-video popup-video mfp-iframe video-btn" style="position:absolute;"> <i
                            class="fa fa-play"></i></a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 wow video-bar fadeInUp" data-wow-delay="0.4s">
                <div class="video-item">
                    <img src="assets/chess-assets/img/video-2.png">
                    <a href="#" class="iq-video popup-video mfp-iframe video-btn" style="position:absolute;"> <i
                            class="fa fa-play"></i></a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 wow video-bar fadeInUp" data-wow-delay="0.6s">
                <div class="video-item">
                    <img src="assets/chess-assets/img/video-3.png">
                    <a href="#" class="iq-video popup-video mfp-iframe video-btn" style="position:absolute;"> <i
                            class="fa fa-play"></i></a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 wow video-bar fadeInUp" data-wow-delay="0.8s">
                <div class="video-item">
                    <img src="assets/chess-assets/img/video-4.png">
                    <a href="#" class="iq-video popup-video mfp-iframe video-btn" style="position:absolute;"> <i
                            class="fa fa-play"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Pricing Section -->

<!-- Start Faq Section -->
<section class="faq-area section-padding" id="project">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-md-12">
                <div class="section-title">
                    <div class="sec-bubble">
                        <div class="bubble"></div>
                        <div class="bubble"></div>
                        <div class="bubble"></div>
                    </div>
                    <h2>Benefits Of Playing Chess</h2>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 faq-item wow fadeInUp" data-wow-delay="0.2s">
                <div class="faq-img">
                    <img src="assets/chess-assets/img/benefits.jpg" class="img-fluid" alt="faq" style="width: 100%">
                </div>
            </div>
            <div class="col-lg-6 col-md-12 faq-item wow fadeInDown custom-padding mobile-top" data-wow-delay="0.4s">
                <h5 class="mb-4 mt-2 custom-p"><i class="fa fa-check-square-o" style="padding-right: 1rem;"></i>They
                    improve cognitive skills</h4>
                    <h5 class="mb-4 mt-2 custom-p"><i class="fa fa-check-square-o" style="padding-right: 1rem;"></i>They
                        strengthen critical thinking</h4>
                        <h5 class="mb-4 mt-2 custom-p"><i class="fa fa-check-square-o"
                                style="padding-right: 1rem;"></i>They support creativity</h4>
                            <h5 class="mb-4 mt-2 custom-p"><i class="fa fa-check-square-o"
                                    style="padding-right: 1rem;"></i>They increase patience and perseverance</h4>
                                <h5 class="mb-4 mt-2 custom-p"><i class="fa fa-check-square-o"
                                        style="padding-right: 1rem;"></i>They develop social skills</h4>
                                    <h5 class="mb-4 mt-2 custom-p"><i class="fa fa-check-square-o"
                                            style="padding-right: 1rem;"></i>They reduce stress</h4>
                                        <h5 class="mb-4 mt-2 custom-p"><i class="fa fa-check-square-o"
                                                style="padding-right: 1rem;"></i>They provide entertainment and pleasure
                                            </h4>
            </div>
        </div>
    </div>
</section>
<!-- End Faq Section -->
<section class="faq-area section-padding bg-grey" id="project">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-md-12">
                <div class="section-title">
                    <div class="sec-bubble">
                        <div class="bubble"></div>
                        <div class="bubble"></div>
                        <div class="bubble"></div>
                    </div>
                    <small style="font-weight: bold; padding-bottom: 1rem;">LEARNING USING THE CHESS CLASS</small>
                    <h2>What is a CHESS CLASS on <span style="color: #ff5722">Chess.Com</span></h2>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 faq-item wow fadeInUp row align-items-center" data-wow-delay="0.2s"
                style="display: flex; justify-content: center;">
                <div class="faq-img align-items-center col-lg-10"
                    style="position: relative; display: flex; justify-content: center;">
                    <img src="assets/chess-assets/img/classroom-1.jpg" class="img-fluid" alt="faq" style="width: 100%">
                    <div class="btn-go-bar" style="position:absolute;">
                        <a href="#" class="iq-video popup-video mfp-iframe video-btn"> <i class="fa fa-play"></i></a>
                        <a href="https://www.chesskid.com/learn/classroom" style="margin-top: 2rem;"
                            class="button-two">Joining Classroom</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="accordian-panel fag-area" style="padding-bottom: 100px; padding-top: 100px;">
    <div class="container">
        <div class="faq-content row" style="display: flex; justify-content: center; align-items: center;">
            <div class="col-md-12">
                <div class="section-title">
                    <div class="sec-bubble">
                        <div class="bubble"></div>
                        <div class="bubble"></div>
                        <div class="bubble"></div>
                    </div>
                    <small style="font-weight: bold; padding-bottom: 1rem;">WHAT IS YOUR QUESTION?</small>
                    <h2>Questions & Answers</h2>
                </div>
            </div>
            <div class="accordion accordion-style1 col-lg-10" id="faqWidget_66476c800bc2a">
                <div class="accordion-item accordion-box active">
                    <div class="accordion-header" id="faq_66476c800bc31"><button class="accordion-button " type="button"
                            data-bs-toggle="collapse" data-bs-target="#faq_66476c800bc31_collapse" aria-expanded="true"
                            aria-controls="faq_66476c800bc31_collapse">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">What are the recruitment criteria for chess
                                    classes?</font>
                            </font>
                        </button></div>
                    <div id="faq_66476c800bc31_collapse" class="accordion-collapse collapse show"
                        aria-labelledby="faq_66476c800bc31" data-bs-parent="#faqWidget_66476c800bc2a">
                        <div class="accordion-body">
                            <p>
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">Recruitment criteria include age (6-13
                                        years), interest in playing chess and playing skills.</font>
                                </font>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item accordion-box ">
                    <div class="accordion-header" id="faq_66476c800bc3b"><button class="accordion-button collapsed"
                            type="button" data-bs-toggle="collapse" data-bs-target="#faq_66476c800bc3b_collapse"
                            aria-expanded="false" aria-controls="faq_66476c800bc3b_collapse">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">What are the goals and teaching methods used in
                                    classes?</font>
                            </font>
                        </button></div>
                    <div id="faq_66476c800bc3b_collapse" class="accordion-collapse collapse "
                        aria-labelledby="faq_66476c800bc3b" data-bs-parent="#faqWidget_66476c800bc2a">
                        <div class="accordion-body">
                            <p>Głównym celem jest rozwijanie logicznego myślenia, koncentracji oraz umiejętności
                                planowania strategicznego. Metody nauczania obejmują lekcje teoretyczne, gry praktyczne
                                oraz rozwiązywanie zagadek szachowych.</p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item accordion-box ">
                    <div class="accordion-header" id="faq_66476c800bc40"><button class="accordion-button collapsed"
                            type="button" data-bs-toggle="collapse" data-bs-target="#faq_66476c800bc40_collapse"
                            aria-expanded="false" aria-controls="faq_66476c800bc40_collapse">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Are classes adapted to different skill levels of
                                    students?</font>
                            </font>
                        </button></div>
                    <div id="faq_66476c800bc40_collapse" class="accordion-collapse collapse "
                        aria-labelledby="faq_66476c800bc40" data-bs-parent="#faqWidget_66476c800bc2a">
                        <div class="accordion-body">
                            <p>Zajęcia szachowe są prowadzone indywidualnie w grupie co pozwala na łączenie różnych
                                poziomów.</p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item accordion-box ">
                    <div class="accordion-header" id="faq_66476c800bc45"><button class="accordion-button collapsed"
                            type="button" data-bs-toggle="collapse" data-bs-target="#faq_66476c800bc45_collapse"
                            aria-expanded="false" aria-controls="faq_66476c800bc45_collapse">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">How often do classes take place and how long do
                                    they last?</font>
                            </font>
                        </button></div>
                    <div id="faq_66476c800bc45_collapse" class="accordion-collapse collapse "
                        aria-labelledby="faq_66476c800bc45" data-bs-parent="#faqWidget_66476c800bc2a">
                        <div class="accordion-body">
                            <p>Zajęcia odbywają się raz w tygodniu i trwają około 45 minut.</p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item accordion-box ">
                    <div class="accordion-header" id="faq_66476c800bc49"><button class="accordion-button collapsed"
                            type="button" data-bs-toggle="collapse" data-bs-target="#faq_66476c800bc49_collapse"
                            aria-expanded="false" aria-controls="faq_66476c800bc49_collapse">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">What is the maximum number of participants in a
                                    group?</font>
                            </font>
                        </button></div>
                    <div id="faq_66476c800bc49_collapse" class="accordion-collapse collapse "
                        aria-labelledby="faq_66476c800bc49" data-bs-parent="#faqWidget_66476c800bc2a">
                        <div class="accordion-body">
                            <p>Maksymalna liczba uczestników w zajęciach stacjonarnych to 12 osób, a w zajęciach online
                                50 osób.</p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item accordion-box ">
                    <div class="accordion-header" id="faq_66476c800bc4d"><button class="accordion-button collapsed"
                            type="button" data-bs-toggle="collapse" data-bs-target="#faq_66476c800bc4d_collapse"
                            aria-expanded="false" aria-controls="faq_66476c800bc4d_collapse">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">What are the qualifications and experience of the
                                    instructor conducting the classes?</font>
                            </font>
                        </button></div>
                    <div id="faq_66476c800bc4d_collapse" class="accordion-collapse collapse "
                        aria-labelledby="faq_66476c800bc4d" data-bs-parent="#faqWidget_66476c800bc2a">
                        <div class="accordion-body">
                            <p>Instruktor prowadzący zajęcia szachowe ma odpowiednie kwalifikacje i doświadczenie w
                                nauczaniu gry w szachy.</p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item accordion-box ">
                    <div class="accordion-header" id="faq_66476c800bc52"><button class="accordion-button collapsed"
                            type="button" data-bs-toggle="collapse" data-bs-target="#faq_66476c800bc52_collapse"
                            aria-expanded="false" aria-controls="faq_66476c800bc52_collapse">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Do children have to have their own chess sets or
                                    are these provided by the instructor?</font>
                            </font>
                        </button></div>
                    <div id="faq_66476c800bc52_collapse" class="accordion-collapse collapse "
                        aria-labelledby="faq_66476c800bc52" data-bs-parent="#faqWidget_66476c800bc2a">
                        <div class="accordion-body">
                            <p>Instruktor zapewnia zestawy szachowe, ale zachęcamy do przyniesienia własnych szachów.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item accordion-box ">
                    <div class="accordion-header" id="faq_66476c800bc56"><button class="accordion-button collapsed"
                            type="button" data-bs-toggle="collapse" data-bs-target="#faq_66476c800bc56_collapse"
                            aria-expanded="false" aria-controls="faq_66476c800bc56_collapse">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Do you organize chess tournaments or other events
                                    related to the game?</font>
                            </font>
                        </button></div>
                    <div id="faq_66476c800bc56_collapse" class="accordion-collapse collapse "
                        aria-labelledby="faq_66476c800bc56" data-bs-parent="#faqWidget_66476c800bc2a">
                        <div class="accordion-body">
                            <p>Stacjonarne turnieje organizujemy raz na semestr, podczas gdy turnieje online odbywają
                                się raz w tygodniu, aby uczestnicy mogli przetestować swoje umiejętności w praktyce.</p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item accordion-box ">
                    <div class="accordion-header" id="faq_66476c800bc5a"><button class="accordion-button collapsed"
                            type="button" data-bs-toggle="collapse" data-bs-target="#faq_66476c800bc5a_collapse"
                            aria-expanded="false" aria-controls="faq_66476c800bc5a_collapse">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">What are the costs of participating in chess
                                    classes?</font>
                            </font>
                        </button></div>
                    <div id="faq_66476c800bc5a_collapse" class="accordion-collapse collapse "
                        aria-labelledby="faq_66476c800bc5a" data-bs-parent="#faqWidget_66476c800bc2a">
                        <div class="accordion-body">
                            <p>Koszt uczestnictwa w zajęciach szachowych wynosi 125 PLN miesięcznie.</p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item accordion-box ">
                    <div class="accordion-header" id="faq_66476c800bc5e"><button class="accordion-button collapsed"
                            type="button" data-bs-toggle="collapse" data-bs-target="#faq_66476c800bc5e_collapse"
                            aria-expanded="false" aria-controls="faq_66476c800bc5e_collapse">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Is it possible to continue learning chess outside
                                    of school?</font>
                            </font>
                        </button></div>
                    <div id="faq_66476c800bc5e_collapse" class="accordion-collapse collapse "
                        aria-labelledby="faq_66476c800bc5e" data-bs-parent="#faqWidget_66476c800bc2a">
                        <div class="accordion-body">
                            <p>Oprócz lekcji stacjonarnych w szkole, istnieje możliwość kontynuowania nauki szachów
                                online.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include("client.components.contact");

@endsection

@section('custom_js')
<script>
$(document).ready(function() {
    
});
</script>
@endsection