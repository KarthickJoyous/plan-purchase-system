<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\SubscriptionPlanPayment;
use Exception;
use Illuminate\Http\Request;

class SubscriptionPlanPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {

            $payments = SubscriptionPlanPayment::query()
            ->with(['subscriptionPlan:id,name'])
            ->where('user_id', auth('web')->id())
            ->latest('expire_at')
            ->paginate(10);

            return view('users.subscription_plan_payments.index', [
                'payments' => $payments
            ]);

        } catch(Exception $e) {

            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(SubscriptionPlanPayment $payment)
    {
        abort_if($payment->user_id != auth('web')->id(), 403);

        return view('users.subscription_plan_payments.show', [
            'payment' => $payment
        ]);
    }
}
