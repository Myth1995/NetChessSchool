<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{isset($seoData->title) ? $seoData->title : 'Network Chess School'}}</title>
    <meta name="author" content="{{isset($seoData->author) ? $seoData->author : 'TOP-ALLIANCE'}}">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="description"
        content="LEVY Embassy Services GmbH in providing top-tier embassy and limousine services for an exclusive clientele." />
    <meta name="keywords"
        content="{{isset($seoData->keywords) ? $seoData->keywords : 'Service, TOP-ALLIANCE, Chauffeurservice Limousine, limousinenservice frankfurt, limousinenservice münchen, chauffeurservice zürich, limousinenservice davos,chauffeurservice, limousinenservice'}}" />
    <meta property="og:locale" content="{{isset($seoData->local) ? $seoData->local : 'en_US'}}" />
    <meta property="og:type" content="{{isset($seoData->type) ? $seoData->type : 'website'}}" />
    <meta property="og:title"
        content="{{isset($seoData->title) ? $seoData->title : 'TOP ALLIANCE Chauffeurservice'}}" />
    <meta property="og:description"
        content="{{isset($seoData->description) ? $seoData->description : 'TOP-ALLIANCE offers you an excellent limousine and chauffeur service in Frankfurt, Munich, Zurich, Vienna and worldwide.'}}" />
    <meta property="og:url" content="{{isset($seoData->slug) ? url($seoData->slug) : route('index')}}" />
    <meta property="og:site_name" content="{{isset($seoData->sitename) ? $seoData->sitename : 'top-alliance'}}" />
    <meta property="og:image"
        content="{{isset($seoData->image) ? url($seoData->image) : asset('assets/img/top_alliance_logo.png')}}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet">
    <!-- Favicon -->
    <!-- Site All Style Sheet Css -->
    <link href="{{asset('assets/chess-assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/chess-assets/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/chess-assets/css/et-line.css')}}" rel="stylesheet">
    <link href="{{asset('assets/chess-assets/css/magnific-popup.css')}}" rel="stylesheet">
    <link href="{{asset('assets/chess-assets/css/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/chess-assets/css/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/chess-assets/css/owl.theme.default.min.css')}}" rel="stylesheet">
    <!-- Swiper Min CSS -->
    <link rel="stylesheet" href="{{asset('assets/chess-assets/css/swiper.min.css')}}">
    <!-- Site Main Style Sheet Css -->
    <link href="{{asset('assets/chess-assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/chess-assets/css/responsive.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/sweetalert/sweetalert2.min.css')}}">
    

    @yield('custom_css')

</head>

<body>
    @include('client.layout.header')
    @yield('content')
    @include('client.layout.footer')
    <!-- Start Back to Top -->
    <div class="back-to-top">
        <i class="fa fa-caret-up"></i>
        <i class="fa fa-caret-up"></i>
    </div>
    <!-- End Back to Top -->
</body>


<script src="{{asset('assets/js/basic/jquery.min.js')}}"></script>
<script>
var _token = $('meta[name="csrf-token"]').attr('content');
</script>
<script src="{{asset('assets/toastr/toastr.min.js')}}"></script>
<script src="{{asset('assets/sweetalert/sweetalert2.min.js')}}"></script>
<script src="{{asset('assets/custom/app.js')}}"></script>
<script src="{{asset('assets/js/languages.js')}}"></script>
<script src="{{asset('assets/chess-assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/chess-assets/js/plugins.js')}}"></script>
<script src="{{asset('assets/chess-assets/js/wow.min.js')}}"></script>
<!-- Swiper Min JS -->
<script src="{{asset('assets/chess-assets/js/swiper.min.js')}}"></script>
<!-- Site Main Js -->
<script src="{{asset('assets/chess-assets/js/main.js')}}"></script>

<script>
$(document).ready(function() {
    settingBodyHeaderMarginTop();

    $("#myTab").find(".nav-link").on("click", function(event){
        event.preventDefault();
        $("#myTab").find(".nav-link").removeClass("active");
        $(this).addClass("active");
        let target = $(this).data("target");
        $("#myTabContent").find(".tab-pane").removeClass("show");
        $("#myTabContent").find(".tab-pane").removeClass("active");
        $("#"+target+"-tab-panel").addClass("show");
        $("#"+target+"-tab-panel").addClass("active");
    });

});

$(window).on("resize", function() {
    settingBodyHeaderMarginTop();
});

function change_language(language) {
    var url = "{{ route('changeLang') }}";
    window.location.href = url + "?lang=" + language;
}

function settingBodyHeaderMarginTop() {
    let header_height = $(".header-menu-list").outerHeight();
    $("#body-header").css("margin-top", header_height);
    $("#contact-page-banner").css("margin-top", header_height);
    
}


</script>
@yield('custom_js')

</html>