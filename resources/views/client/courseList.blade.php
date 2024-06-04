@extends('client.layout.app')
@section('title', 'TRAINING PACKAGE II')
@section('custom_css')
<style>
.single-services-item {
    cursor: pointer;
}
</style>
@endsection
@section('content')
@include('client.components.body-header')
<section class="faq-area section-padding">
    <div class="container">
        <div class="row d-flex align-items-center">
            @foreach ($courses as $course)
            <div class="single-services-item course-item wow fadeInUp" data-wow-delay="0.2s" data-id="{{$course->id}}">
                <div class="services-info">
                    <div class="col-lg-12 row display-flex justify-content-center course-item">
                        <div
                            class="col-lg-2 col-md-6 col-sm-12  display-flex align-items-center justify-content-center">
                            <img src="{{asset('assets/chess-assets/img/'.@$course->image_url)}}" style="width: 150px;">
                        </div>
                        <div
                            class="col-lg-4 col-md-6 col-sm-12  text-left display-flex flex-direction-column justify-content-center detail-bar">
                            <h6 style="padding-top: 0;">{{@$course->title}}</h6>
                            <p class="color-yellow" style="margin-bottom: 8px;">{{@$course->mini_desc}}</p>
                            <div class="course-meta-info display-flex justify-content-flex-start">
                                <div class="meta-item display-flex ">
                                    <i class="fa fa-bookmark color-bland"></i>
                                    <span>4 Weeks</span>
                                </div>
                                <div class="meta-item display-flex ">
                                    <i class="fa fa-bookmark color-bland"></i>
                                    <span>Wszystkie poziomy</span>
                                </div>
                            </div>
                            <div class="course-meta-info display-flex justify-content-flex-start">
                                <div class="meta-item display-flex ">
                                    <i class="fa fa-bookmark color-bland"></i>
                                    <span>4 Lekcja</span>
                                </div>
                                <div class="meta-item display-flex ">
                                    <i class="fa fa-bookmark color-bland"></i>
                                    <span>0 Quiz</span>
                                </div>
                                <div class="meta-item display-flex ">
                                    <i class="fa fa-bookmark color-bland"></i>
                                    <span>201 Kursant</span>
                                </div>
                            </div>
                        </div>
                        <div
                            class="col-lg-4 col-md-6 col-sm-12 display-flex flex-direction-column align-items-flex-start justify-content-center instructor-bar">
                            <div class="display-flex align-items-center">
                                <div class="service-avatar circle-radius" style="border: 3px solid #ffb606">
                                    <img src="{{asset('assets/chess-assets/img/instructor.jpg')}}"
                                        class="circle-radius">
                                </div>
                                <div class="service-title-item" style="padding-left: 1rem;">
                                    <h6 class="color-grey" style="font-size: 12px; text-align: left; padding: 0;">
                                        Instructor</h6>
                                    <span>MacSzach</span>
                                </div>
                            </div>
                        </div>
                        <a href="{{route('course.index',$course->id)}}" class="read-more-button" style="margin-top: 0px;">Read
                            more</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
@section('custom_js')
<script>
$(document).ready(function() {
    console.log("Course detail page init!");
    $(".single-services-item").on("click", function() {
        let id = $(this).data("id");
        window.location.href = "{{url('/')}}/course/" + id;
    });
});
</script>
@endsection