@extends('client.layout.app')

@section('title', 'MLM DASHBOARD')
@section('custom_css')
<link rel="stylesheet" href="{{asset('assets/leftsidebar/style.css')}}">
<style>
    #sidebar{
        background: none!important;
    }

    #mln-title{
        color: white!important;
    }
</style>
@endsection
@section('content')
@include('client.components.body-header')
<section class="faq-area bg-brand service-detail-title-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="wrapper d-flex align-items-stretch" id="mln_dashboard-panel">
                    <nav id="sidebar">
                        <div class="p-4 pt-5">
                            <h1><a href="index.html" class="logo">Splash</a></h1>
                            <ul class="list-unstyled components mb-5">
                                <li class="active">
                                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false"
                                        class="dropdown-toggle">Home</a>
                                    <ul class="collapse list-unstyled" id="homeSubmenu">
                                        <li>
                                            <a href="#">Home 1</a>
                                        </li>
                                        <li>
                                            <a href="#">Home 2</a>
                                        </li>
                                        <li>
                                            <a href="#">Home 3</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">About</a>
                                </li>
                                <li>
                                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false"
                                        class="dropdown-toggle">Pages</a>
                                    <ul class="collapse list-unstyled" id="pageSubmenu">
                                        <li>
                                            <a href="#">Page 1</a>
                                        </li>
                                        <li>
                                            <a href="#">Page 2</a>
                                        </li>
                                        <li>
                                            <a href="#">Page 3</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Portfolio</a>
                                </li>
                                <li>
                                    <a href="#">Contact</a>
                                </li>
                            </ul>

                            <div class="mb-5">
                                <h3 class="h6">Subscribe for newsletter</h3>
                                <form action="#" class="colorlib-subscribe-form">
                                    <div class="form-group d-flex">
                                        <div class="icon"><span class="icon-paper-plane"></span></div>
                                        <input type="text" class="form-control" placeholder="Enter Email Address">
                                    </div>
                                </form>
                            </div>

                            <div class="footer">
                                <p>
                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                    Copyright &copy;<script>
                                    document.write(new Date().getFullYear());
                                    </script> All rights reserved | This template is made with <i class="icon-heart"
                                        aria-hidden="true"></i> by <a href="https://colorlib.com"
                                        target="_blank">Colorlib.com</a>
                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                </p>
                            </div>

                        </div>
                    </nav>

                    <!-- Page Content  -->
                    <div id="mln-content" class="p-4 p-md-5 pt-5">

                        <h2 class="mb-4 mln-header-title">Sidebar #02</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et
                            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
                            ut aliquip ex
                            ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                            dolore eu fugiat
                            nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                            deserunt mollit
                            anim id est laborum.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et
                            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
                            ut aliquip ex
                            ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                            dolore eu fugiat
                            nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                            deserunt mollit
                            anim id est laborum.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('custom_js')
<script src="{{asset('assets/js/basic/jquery.min.js')}}"></script>
<script src="{{asset('assets/leftsidebar/popper.js')}}"></script>
<script src="{{asset('assets/chess-assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/leftsidebar/main.js')}}"></script>
<script>
$(document).ready(function() {
    console.log("MLM DASHBOARD page init!");


});
</script>
@endsection