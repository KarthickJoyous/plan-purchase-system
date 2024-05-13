@extends('layouts.user.app')

@section('title', __('messages.user.payments.title') . " ($payment->unique_id)")

@section('breadcrumn') @endsection

@section('content')
<section class="section dashboard">
<div class="container mt-5">
  <div class="card">
    <div class="card-header">{{__('messages.user.payments.details')}}</div>
    <div class="card-body mt-4">
      <div class="row">
        <div class="col-md-6">
          <p><strong>{{__('messages.user.payments.amount')}}: </strong>{{(new App\Helpers\viewHelper)->formatted_amount($payment->amount)}}</p>
          <p><strong>{{__('messages.user.payments.subscription_plan')}}: </strong> {{$payment->subscriptionPlan->name ?: __('messages.user.common.na') }}</p>
          <p><strong>{{__('messages.user.payments.paid_at')}}: </strong>{{(new App\Helpers\viewHelper)->convert_timezone($payment->created_at, DEFAULT_TIMEZONE, 'd-m-Y H:i A')}}</p>
        </div>
        <div class="col-md-6">
        <p><strong>{{__('messages.user.payments.payment_id')}}: </strong>{{$payment->payment_id ?: __('messages.user.common.na')}}</p>
          <p><strong>{{__('messages.user.payments.status')}}: </strong>
            <span class="badge rounded-pill bg-{{$payment->status ? 'success' : 'danger'}}">
                {{$payment->status ? __('messages.user.common.success') : __('messages.user.common.failed') }}
            </span>
          </p>
          <p><strong>{{__('messages.user.payments.expire_at')}}: </strong>{{(new App\Helpers\viewHelper)->convert_timezone($payment->expire_at, DEFAULT_TIMEZONE, 'd-m-Y H:i A')}}</p>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
@endsection