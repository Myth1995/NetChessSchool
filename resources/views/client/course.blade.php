@extends('client.layout.app')
@section('title', 'Course Purchase')
@section('custom_css')
<style>

.service-detail-description-info{
    color: white;
}

.service-detail-description-info .nav-tabs {
    margin-bottom: 3rem;
    box-shadow: 0 5px 10px 0 rgba(0, 0, 0, 0.06);
}

.service-detail-description-info .nav-tabs .nav-link.active {
    border: none;
    border-bottom-color: #ff5722 !important;
    color: #ff5722 !important;
}

.service-detail-description-info .nav-tabs .nav-link {
    font-weight: 600;
    border: none;
    color: white;
}

.service-detail-bar{
    padding-bottom: 80px;
}

.lesson-item{
    padding-bottom: 2rem;
    cursor: pointer;
}

.lesson-item:hover .lesson-item-info{
    border-color: #ff5722!important;
}

.service-avatar{
    cursor: pointer;
}

.course-img{
    padding: 5px;
    /* border: 1px solid lightgray; */
}

.lesson-tag{
    padding-left: 1rem;
    padding-bottom: 1rem;
}

</style>
@endsection
@section('content')
@include('client.components.body-header')
<section class="faq-area bg-brand service-detail-title-bar">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div
                class="col-md-12 row title-bar display-flex; justify-content-center align-items-center text-center m-p-b-3">
                <h2 class="color-white">{{@$course->title}}</h2>
                <p class="color-white">{{@$course->mini_desc}}</p>
                <div class="button-bar display-flex justify-content-center">
                    <a href="#" class="button-two course-buy">Buy now</a>
                </div>
            </div>
            <div class="col-md-12 row title-bar">
                <div class="col-md-4 col-sm-12 display-flex align-items-center justify-content-center">
                    <div class="display-flex align-items-center">
                        <div class="service-avatar circle-radius" style="border: 3px solid #ffb606">
                            <img src="{{asset('assets/chess-assets/img/instructor.jpg')}}" class="circle-radius">
                        </div>
                        <div class="service-title-item">
                            <h6 class="color-grey" style="font-size: 12px; padding-bottom: 5px;">Instructor</h6>
                            <span class="color-white">MacSzach</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 display-flex align-items-center justify-content-center">
                    <div class="display-flex align-items-center">
                        <div class="service-avatar">
                            <img src="{{asset('assets/chess-assets/img/coins-solid.svg')}}" style="width: 60px;">
                        </div>
                        <div class="service-title-item">
                            <h6 class="color-white" style="font-size: 12px; padding-bottom: 5px;">price</h6>
                            <span class="color-white">{{@$course->price}} <small>NCS</small></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 display-flex align-items-center justify-content-center">
                    <div class="display-flex align-items-center">
                        <div class="service-avatar">
                            <img src="{{asset('assets/chess-assets/img/bookmark-regular.svg')}}" style="width: 42px;">
                        </div>
                        <div class="service-title-item">
                            <h6 class="color-white" style="font-size: 12px; padding-bottom: 5px;">category</h6>
                            <span class="color-white">{{@$course->category}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="faq-area bg-brand service-detail-description-info">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-md-12 row m-p-t-2">
                <ul class="nav nav-tabs my-info-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-target="couse" id="couse-tab" data-toggle="tab"
                            href="#couse-tab-panel" role="tab" aria-controls="couse-tab-panel"
                            aria-selected="true">Description</a>
                    </li>
                    @php
                        $lesson_show = false;
                        $lessons = App\Models\Lesson::where("course_id", $course->id)->where("status",1)->get();
                        if(count($lessons) > 0){
                             $lesson_show = true;
                        }
                    @endphp
                    @if ($lesson_show)
                        <li class="nav-item">
                            <a class="nav-link" data-target="tests" id="tests-tab" data-toggle="tab" href="#tests-tab-panel"
                                role="tab" aria-controls="tests-tab-panel" aria-selected="false">Lesson</a>
                        </li>
                    @endif
                </ul>
                <div class="tab-content profile-tab service-detail-bar" id="myTabContent">
                    <div class="tab-pane fade show active" id="couse-tab-panel" role="tabpanel"
                        aria-labelledby="couse-tab">
                        <div class="row">
                            <div class="col-md-2">
                                <img class="course-img" src="{{asset('assets/chess-assets/img/'.@$course->image_url)}}" style="width: 200px;">
                            </div>
                            <div class="col-md-10">
                                {{@$course->description}}
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tests-tab-panel" role="tabpanel" aria-labelledby="tests-tab" >
                        <div class="row">
                            @php
                                $lesson_tag = null;
                            @endphp
                            @foreach ($lessons as $lesson)
                                @if($lesson->tag != $lesson_tag)
                                    <div class="lesson-tag">{{@$lesson->tag}}</div>
                                @endif
                                @php
                                    $lesson_tag = $lesson->tag;
                                @endphp
                                <div class="col-md-12 row lesson-item">
                                    <div class="col-md-1 display-flex align-items-center justify-content-flex-end">
                                        <img src="{{asset('assets/chess-assets/img/bookmark-regular.svg')}}" style="width: 20px;">
                                    </div>
                                    <div class="col-md-11 display-flex flex-direction-column justify-content-center border-bottom-style lesson-item-info">
                                        <span class="color-white">{{$lesson->title}}</span>
                                        <h6 class="color-white" style="font-size: 12px;">{{@$lesson->duration}} {{@$lesson->duration_type}}</h6>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('custom_js')
<script>
$(document).ready(function() {
    console.log("Service Detail page init!");
    $(".course-buy").on("click", function(e){
        e.preventDefault();
        localStorage.setItem("check-course",0);
        window.location.href = "/profile?type=subscription&course="+"{{$course->id}}";
    });
});
</script>
@endsection