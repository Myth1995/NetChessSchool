@extends('client.layout.app')

@section('title', 'Contact')
@section('custom_css')
@endsection
@section('content')
@include("client.components.contact");
@endsection

@section('custom_js')
<script>
$(document).ready(function() {
    console.log("contact page init!");
    
});
</script>
@endsection