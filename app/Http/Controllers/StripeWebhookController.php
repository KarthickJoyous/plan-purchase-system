<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\SubscriptionPlanPayment;
use App\Models\{User, SubscriptionPlan};
use Illuminate\Http\{Response};

class StripeWebhookController extends Controller
{
    /** 
     * To listen to webhook from stripe, validate payload & save payment for user.
     * @param Request $request
     * @return Response  
    */
    public function __invoke(Request $request): Response
    {
        try {

            $event = $request->type;

            throw_if($event != 'invoice.payment_succeeded', new Exception(__('messages.user.subscription_plans.webhook_event_error', ['event' => $event])));

            $api_id = $request->data['object']['lines']['data'][0]['plan']['id'] ?? null;

            $email = $request->data['object']['customer_email'] ?? null;

            $subscription_plan = SubscriptionPlan::firstWhere(['api_id' => $api_id]);

            throw_if(!$subscription_plan, new Exception(__('messages.user.subscription_plans.not_found', ['api_id' => $api_id])));

            $user = User::firstWhere(['email' => $email]);

            throw_if(!$user, new Exception(__('messages.user.profile.not_found', ['email' => $email])));

            $payment_id = $request->data['object']['payment_intent'] ?? Str::uuid();

            DB::transaction(function() use($subscription_plan, $user, $payment_id) {

                $max_expire_date = SubscriptionPlanPayment::query()
                ->where(['user_id' => $user->id])
                ->whereDate('expire_at', '>=', now())
                ->latest('expire_at')
                ->first()?->expire_at;
                
                $subscription_plan_payment = SubscriptionPlanPayment::Create([
                    'subscription_plan_id' => $subscription_plan->id,
                    'user_id' => $user->id,
                    'amount' => $subscription_plan->amount,
                    'payment_id' => $payment_id,
                    'expire_at' => $max_expire_date ? Carbon::parse($max_expire_date)->addMonths(1) : now()->addMonths(1),
                    'status' => CHECKOUT_SUCCESS
                ]);

                throw_if(!$subscription_plan_payment, new Exception(__('messages.user.subscription_plans.checkout_failed')));
            });

            info("Subscription success (Payment ID : $payment_id)");

        } catch(Exception $e) {

            info("Webhook Error : " . $e->getMessage());
        }

        return response()->noContent();
    }
}
