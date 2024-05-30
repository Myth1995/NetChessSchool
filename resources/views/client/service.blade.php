@extends('client.layout.app')

@section('title', 'service')
@section('custom_css')
    <style>
        #student-rating{
            background-image: url('assets/chess-assets/img/child-bg.png');
            background-size: cover;
            background-repeat: no-repeat;
        }
    </style>
@endsection
@section('content')
    @include('client.components.body-header')
    @include('client.components.service')
    <section class="faq-area section-padding bg-grey" id="student-rating">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-md-12">
                <div class="section-title">
                    <div class="sec-bubble">
                        <div class="bubble"></div>
                        <div class="bubble"></div>
                        <div class="bubble"></div>
                    </div>
                    <h2 class="wow fadeInUp" data-wow-delay="0.2s" ><span style="color: #ff5722">What Our Students Say</span></h2>
                    <small class="wow fadeInUp" style="font-weight: bold; padding-bottom: 1rem;" data-wow-delay="0.3s">Our preschool program consists of four dedicated classes</small>
                </div>
            </div>
            <div class="col-lg-1 em"></div>
            <div class="col-lg-5 col-md-12 col-sm-12 wow fadeInUp" data-wow-delay="0.2s">
                <div class="single-services-item">
                    <div class="services-info">
                        <div class="img-bar">
                            Chess classes strengthened my critical thinking. Now I approach problems with strategy and foresight.
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="display-flex align-items-center m-p-t-2">
                                    <div class="student-avatar circle-radius">
                                        <img src="{{asset('assets/chess-assets/img/boy.jpg')}}" class="circle-radius">
                                    </div>
                                    <div class="student-info">
                                        <h6>Joeby Ragpa</h6>
                                        <span class="my-color">STUDENT</span>  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-12 col-sm-12 wow fadeInUp" data-wow-delay="0.4s">
                <div class="single-services-item">
                    <div class="services-info">
                        <div class="img-bar">
                            Engaging chess lessons improved my concentration and decision-making skills. A must-have for anyone seeking mental fitness.
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="display-flex align-items-center m-p-t-2">
                                    <div class="student-avatar circle-radius">
                                        <img src="{{asset('assets/chess-assets/img/girl.jpg')}}" class="circle-radius">
                                    </div>
                                    <div class="student-info">
                                        <h6>Alexander Samokhin</h6>
                                        <span class="my-color">STUDENT</span>  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-1 em"></div>
            <div class="col-lg-1 em"></div>
            <div class="col-lg-5 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="0.2s">
                <div class="single-services-item">
                    <div class="services-info">
                        <div class="img-bar">
                            Chess classes sharpened my concentration and patience. It's a game that teaches resilience and adaptability.
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="display-flex align-items-center m-p-t-2">
                                    <div class="student-avatar circle-radius">
                                        <img src="{{asset('assets/chess-assets/img/boy.jpg')}}" class="circle-radius">
                                    </div>
                                    <div class="student-info">
                                        <h6>Joeby Ragpa</h6>
                                        <span class="my-color">STUDENT</span>  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="0.4s">
                <div class="single-services-item">
                    <div class="services-info">
                        <div class="img-bar">
                            Chess lessons changed my approach to challenges. The tactics learned are applicable both in chess and in life.
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="display-flex align-items-center m-p-t-2">
                                    <div class="student-avatar circle-radius">
                                        <img src="{{asset('assets/chess-assets/img/girl.jpg')}}" class="circle-radius">
                                    </div>
                                    <div class="student-info">
                                        <h6>Alexander Samokhin</h6>
                                        <span class="my-color">STUDENT</span>  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-1 em"></div>
        </div>
    </div>
    </section>

@endsection
@section('custom_js')
<script>
$(document).ready(function() {
    console.log("Service page init!");

});
</script>
@endsection