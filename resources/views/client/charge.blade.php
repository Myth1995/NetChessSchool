@extends('client.layout.app')

@section('title', 'NCN SCORE CHARGE')
@section('custom_css')
@endsection
@section('content')
@include('client.components.body-header')
<div class="container emp-profile" style="margin-top: 3rem;">
  <form action="/charge" method="POST">
      {{ csrf_field() }}
      <label for="amount">
          Amount (in cents):
          <input type="text" name="amount" id="amount">
      </label>

      <label for="email">
          Email:
          <input type="text" name="email" id="email">
      </label>

      <label for="card-element">
          Credit or debit card
      </label>
      <div id="card-element">
          <!-- A Stripe Element will be inserted here. -->
      </div>

      <!-- Used to display form errors. -->
      <div id="card-errors" role="alert"></div>

      <button type="submit">Submit Payment</button>
  </form>
</div>
@endsection

@section('custom_js')
<script src="https://js.stripe.com/v3/"></script>
<script>
$(document).ready(function() {
    console.log("NCN Score Charge page init!");

});
</script>
@endsection