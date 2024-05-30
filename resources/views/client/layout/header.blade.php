<!-- Start Preloader Section -->
<div class="preloader">
    <div class="preloader-inner">
        <span></span>
        <span></span>
    </div>
</div>
<!-- End Preloader Section -->

<!-- Start Navbar Section -->
<nav class="header-menu-list {{ Request::route()->getName() == "index" ? "" : "check-sticky" }} navbar-area navbar navbar-b navbar-trans fixed-top navbar-expand-lg  {{ Request::route()->getName() == "index" ? "" : "is-sticky" }}  " id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll" href="/">
            <img src="{{asset('assets/chess-assets/img/levy-logo.png')}}" class="white-logo" alt="logo">
            <img src="{{asset('assets/chess-assets/img/levy-black-logo.png')}}" class="black-logo" alt="logo">
        </a>
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
        
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link js-scroll" href="/">Home</a></li>
                <li class="nav-item"><a class="nav-link js-scroll" href="{{route('service.index')}}">Service</a></li>
                <li class="nav-item"><a class="nav-link js-scroll" href="#contact">Contact</a></li>
                @if(!Auth()->check())
                    <li class="nav-item"><a class="nav-link js-scroll" href="{{route('login.index')}}">Login</a></li>
                @endif
                @if(Auth()->check())
                    <li class="nav-item"><a class="nav-link js-scroll" href="{{route('profile.index')}}">{{ Auth()->user()->user_name }}</a></li>
                @endif
                @if(Auth()->check())
                    <li class="nav-item"><a class="nav-link js-scroll" href="{{route('login.out')}}"><svg style="width: 16px; fill: white; margin-bottom: 3px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2024 Fonticons, Inc. --><path  d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 192 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l210.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128zM160 96c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 32C43 32 0 75 0 128L0 384c0 53 43 96 96 96l64 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l64 0z"/></svg></a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar Section -->