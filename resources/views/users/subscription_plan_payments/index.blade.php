@extends('layouts.user.app')

@section('title', __('messages.user.payments.title'))

@section('breadcrumn') @endsection

@section('content')
<section class="section dashboard">
    <div class="card">
        <div class="card-body">
        <h5 class="card-title">{{__('messages.user.payments.title')}} ({{$payments->total()}})</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{__('messages.user.payments.subscription_plan')}}</th>
                    <th scope="col">{{__('messages.user.payments.amount')}}</th>
                    <th scope="col">{{__('messages.user.payments.payment_id')}}</th>
                    <th scope="col">{{__('messages.user.payments.status')}}</th>
                    <th scope="col">{{__('messages.user.payments.paid_at')}}</th>
                    <th scope="col">{{__('messages.user.payments.expire_at')}}</th>
                    <th scope="col">{{__('messages.user.payments.action')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($payments as $key => $payment)
                    <tr>
                        <th scope="row">{{$payments->firstItem() + $key}}</th>
                        <td>{{$payment->subscriptionPlan->name ?: __('messages.user.common.na')}}</td>
                        <td>{{(new App\Helpers\viewHelper)->formatted_amount($payment->amount)}}</td>
                        <td>{{$payment->payment_id ?: __('messages.user.common.na')}}</td>
                        <td>
                            <span class="badge rounded-pill bg-{{$payment->status ? 'success' : 'danger'}}">
                                {{$payment->status ? __('messages.user.common.success') : __('messages.user.common.failed') }}
                            </span>
                        </td>
                        <td>{{(new App\Helpers\viewHelper)->convert_timezone($payment->created_at, DEFAULT_TIMEZONE, 'd-m-Y H:i A')}}</td>
                        <td>{{(new App\Helpers\viewHelper)->convert_timezone($payment->expire_at, DEFAULT_TIMEZONE, 'd-m-Y H:i A')}}</td>
                        <td>
                            <a class="btn btn-info rounded-pill" href="{{route('user.payments.show', $payment->unique_id)}}">{{__('messages.user.payments.view')}}</a>
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">{{__('messages.user.common.no_data_found')}}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            @if($payments->hasPages())
                <div class="d-flex justify-content-end">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item">
                                {{$payments->links('pagination::bootstrap-4')}}
                            </li>
                        </ul>
                    </nav>
                </div>
            @endif
        </div>
    </div>
</section>
@endsection