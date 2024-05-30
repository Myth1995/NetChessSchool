@extends('client.layout.app')

@section('title', 'philosophy')
@section('custom_css')
<link rel="stylesheet" href="{{asset('assets/css/404.css')}}">
@endsection
@section('content')
<section class="main-part d-flex justify-content-center align-items-center">
    <div class="page_404">
        <div class="four_zero_four_bg">
            <h1 class="text-center ">404</h1>
        </div>
        <div class="contant_box_404">
            <h3 class="h2">
                Look like you're lost
            </h3>
            <p>the page you are looking for not avaible!</p>
            <a href="{{route('index')}}" class="link_404">Go to Home</a>
        </div>
    </div>
</section>

@endsection