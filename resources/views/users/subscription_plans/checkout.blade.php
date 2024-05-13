@extends('layouts.user.app')

@section('title', __('messages.user.subscription_plans.checkout'))

@section('breadcrumn') @endsection

@section('content')
<section class="section">
  <div class="row">
    <div class="col-md-4">
      <!-- Subscription Plan Details -->
      <div class="card">
        <div class="card-header">
          Subscription Plan
        </div>
        <div class="card-body">
          <h5 class="card-title">Premium Plan</h5>
          <p class="card-text">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut blandit est eu eros imperdiet, a ultricies nibh fermentum.
          </p>
          <p class="card-text">$30/month</p>
        </div>
      </div>
    </div>
    <div class="col-md-8">
      <!-- User Details and Payment -->
      <div class="card">
        <div class="card-header">
          User Details & Payment
        </div>
        <div class="card-body">
          <form method="POST" action="{{route('user.subscription_plans.checkout', $subscription_plan->unique_id)}}">
            @csrf
            <div class="form-group p-2">
              <label for="name">Name:</label>
              <input type="text" class="form-control" id="name" placeholder="Enter your name">
            </div>
            <div class="form-group p-2">
              <label for="email">Email address:</label>
              <input type="email" class="form-control" id="email" placeholder="Enter your email">
            </div>
            <div class="form-group p-2">
              <label for="cardNumber">Card Number:</label>
              <input type="text" class="form-control" id="cardNumber" placeholder="Enter card number">
            </div>
            <div class="form-group p-2">
              <label for="address">Address:</label>
              <textarea class="form-control" id="address" rows="3" placeholder="Enter your address"></textarea>
            </div>
            <button type="submit" class="btn btn-primary p-2">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection