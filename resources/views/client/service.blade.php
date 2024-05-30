@extends('client.layout.app')

@section('title', 'service')
@section('custom_css')
@endsection
@section('content')
    @include('client.components.body-header')
    @include('client.components.service')
@endsection
@section('custom_js')
<script>
$(document).ready(function() {
    console.log("Service page init!");

});
</script>
@endsection