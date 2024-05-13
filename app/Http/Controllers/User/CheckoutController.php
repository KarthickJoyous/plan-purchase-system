<?php

namespace App\Http\Controllers\User;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{SubscriptionPlan};
use Illuminate\Http\{RedirectResponse};

class CheckoutController extends Controller
{
    /** 
     * To redirect to stripe checkout page.
     * @param Request $request
     * @return RedirectResponse
    */
    public function __invoke(Request $request, $subscription_plan) {
        
        abort_if(!$subscription_plan = SubscriptionPlan::firstWhere(['unique_id' => $subscription_plan]), 404);

        try {

            return $request->user()
            ->newSubscription('default', $subscription_plan->api_id)
            ->checkout([
                'success_url' => route('user.payment_success'),
                'cancel_url' => route('user.payment_cancelled')
            ]);

        } catch(Exception $e) {

            return back()->with('error', $e->getMessage());
        }
    }
}
