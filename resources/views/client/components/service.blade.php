<section id="services" class="services-area section-padding">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-md-12">
                <div class="section-title">
                    <div class="sec-bubble">
                        <div class="bubble"></div>
                        <div class="bubble"></div>
                        <div class="bubble"></div>
                    </div>
                    <h2>Our Services - PLN 125</h2>
                    <p class="col-md-10">Chess Class is an online platform dedicated to providing high-quality chess
                        education for students of all ages and skill levels. Our experienced instructors offer
                        interactive lessons, tactical training and personalized coaching to help players improve their
                        chess skills and reach their full potential. Whether you are a beginner wanting to learn the
                        basics or an advanced player striving to master complex strategies, Chess Class has the
                        resources and support you need to succeed in the game of chess. Join us today and take your
                        chess game to the next level!</p>
                </div>
            </div>
            @foreach ($services as $index => $service)
            @if($index % 2 == 0)
            <div class="col-lg-1 em"></div>
            <div class="col-lg-5 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="0.2s">
                <div class="single-services-item">
                    <div class="services-info">
                        <div class="img-bar">
                            <img class="service-bg" src="{{asset('assets/chess-assets/img/'.$service->image_url)}}">
                        </div>
                        <h6>{{$service["title"]}}</h6>
                        <p>{{$service["mini_desc"]}}</p>
                        <a href="{{route('course.index', $service->id)}}" class="button">Go now</a>
                    </div>
                </div>
            </div>
            @else
            <div class="col-lg-5 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="0.2s">
                <div class="single-services-item">
                    <div class="services-info">
                        <div class="img-bar">
                            <img class="service-bg" src="{{asset('assets/chess-assets/img/'.$service->image_url)}}">
                        </div>
                        <h6>{{$service["title"]}}</h6>
                        <p>{{$service["mini_desc"]}}</p>
                        <a href="{{route('course.index', $service->id)}}" class="button">Go now</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-1 em"></div>
            @endif
            @endforeach
        </div>
    </div>
</section>