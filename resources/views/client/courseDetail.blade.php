@extends('client.layout.app')
@section('title', 'Course Detail')
@section('custom_css')
<style>
.list-group {
    padding-top: 3rem;
}

.list-group-item h5{
    text-transform: capitalize;
    font-weight: 700;
    font-size: 14px;
    letter-spacing: 0.5px;
    font-family: 'Raleway', sans-serif;
    color: #505050;
}

.list-group-item p.mb-1{
    font-size: 13px;
    line-height: 20px;
}

.list-group-item small{
    color: #505050;
}

.list-group-item i{
    color: #505050;
}

.lesson-list{
    border-right: 1px solid #dee2e6;
}
</style>
@endsection
@section('content')
<div class="container course-detail" id="page-content">
    <div class="row">
        <div class="col-md-4 col-sm-12 lesson-list" style="height: 1500px;">
            <div class="list-group">
                @if (isset($lessons) && count($lessons) > 0)
                    @foreach ($lessons as $lesson)
                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">{{$lesson->title}}</h5>
                            @php
                                $duration = $lesson->duration;
                                $duration_unit = "hour";

                                if($lesson->duration_type == "minute"){
                                    $duration_unit = "minute";
                                }

                                if($lesson->duration_type == "second"){
                                    $duration_unit = "second";
                                }

                                if($duration > 1){
                                    $duration_unit = $duration_unit . "s";
                                }
                            @endphp
                            <small class="font-weight-bold">{{$duration}}{{$duration_unit}}</small>
                        </div>
                        @php
                            $description = $lesson->description;
                            if(strlen($description) > 100){
                                $description = substr($description,0,100) . "...";
                            }
                        @endphp
                        <p class="mb-1">{{$description}}</p>
                        <div class="item-action-bar display-flex justify-content-flex-end">
                            <i class="fa fa-lock"></i><i class="fa fa-arrow-right display-none"></i>
                        </div>
                    </a>    
                    @endforeach
                @endif
            </div>
        </div>
        <div class="col-md-8 col-sm-12">

        </div>
    </div>
</div>
@endsection
@section('custom_js')
<script>
$(document).ready(function() {

});
</script>
@endsection