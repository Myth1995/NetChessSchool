@extends('client.layout.app')
@section('title', 'JOIN AS PARTNER')
@section('custom_css')
@endsection
@section('content')
@include('client.components.body-header')
<section id="contact" class="contact-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 wow fadeInUp" data-wow-delay="0.4s">
                <div class="section-title" style="margin-bottom: 0.5rem;">
                    <h2>Sponser Name</h2>
                </div>
                @if(Session::has('sponser_incorrect'))
                    <p class="form-message">{{ Session::get('sponser_incorrect') }}</p>
                @endif
                <form class="contact-form form" id="contact-form" action="#"
                    method="POST">
                    <div class="controls">
                        <div class="row display-flex flex-direction-column align-items-center">
                            <div class="col-lg-3 col-md-3">
                                <div class="form-group has-error has-danger">
                                    <input id="sponser_name" class="text-center font-weight-bold" type="text" name="sponser"
                                        value="{{$sponser}}" placeholder="Sponser Name" required="required" readonly
                                        style="border-right: 3px solid #ff5722; font-weight: bold;">
                                </div>
                            </div>
                            <div class="col-md-12 text-center m-p-t-2">
                                <button type="submit" class="button btn-mlm-register">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
@section('custom_js')
<script>
$(document).ready(function() {
    console.log("Mlm Join Page Init!");

    $(".btn-mlm-register").on("click", function(event){
        event.preventDefault();
        let sponser_name = $("#sponser_name").val();
        if(sponser_name.trim() == ""){
            return false;
        }

        let formData = new FormData();
        formData.append('_token', '{{csrf_token()}}');
        formData.append('sponser', sponser_name.trim());
        
        sendRequest("{{route('mlm.register')}}",formData, function(data){
            window.location.href = "{{route('mlm.dashboard')}}";
        }, function(code){
            
        });

    })
});
</script>
@endsection