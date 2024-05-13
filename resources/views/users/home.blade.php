@extends('layouts.user.app')

@section('title', __('messages.user.home.title'))

@section('breadcrumn') @endsection

@section('content')
<section class="section dashboard">
	<div class="row">
		<div class="container">
			<h2>{{__('messages.user.subscription_plans.title')}}</h2>
			<div class="row">
				@foreach ($subscription_plans as $subscription_plan)
					<div class="col-md-4">
						<div class="card">
							<div class="card-header">
								{{$subscription_plan->name}}
							</div>
							<div class="card-body">
								<h5 class="card-title">{{__('messages.user.subscription_plans.price')}} : {{(new App\Helpers\viewHelper)->formatted_amount($subscription_plan->amount)}}</h5>
								<ul class="list-group list-group-flush">
									<li class="list-group-item">{{$subscription_plan->description}}</li>
								</ul>
								<a target="__blank" href="{{route('user.checkout', $subscription_plan->unique_id)}}" class="btn btn-success mt-3">
									{{__('messages.user.subscription_plans.subscribe')}}
								</a>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>
</section>
@endsection