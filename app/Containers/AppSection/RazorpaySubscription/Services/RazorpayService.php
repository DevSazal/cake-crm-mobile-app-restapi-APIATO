<?php
namespace App\Containers\AppSection\RazorpaySubscription\Services;

use App\Containers\AppSection\RazorpaySubscription\Contracts\IRazorpayService;
use Illuminate\Support\Facades\Config;
use Razorpay\Api\Api;

use App\Containers\AppSection\Plan\Models\Plan;
use App\Containers\AppSection\User\Models\User;

class RazorpayService implements IRazorpayService
{
    public function __construct(){
        $this->rzrKey = Config::get('razorpaysubscription.razorpay.key');
        $this->rzrSecret = Config::get('razorpaysubscription.razorpay.secret');
        $this->api = new Api($this->rzrKey,$this->rzrSecret);
    }
    public function getAllPlans(){
        $rzrActivePlanIds = Config::get('razorpaysubscription.razorpay.active_plans');
        $plans = $this->api->plan->all();
        return $plans;
    }
    public function createSubscription($subscriptionData)
    {
        $plan = Plan::where('razorpay_plan_id', $subscriptionData['plan_id'])->first();
        // dd($plan->id);
        $subscription  = $this->api->subscription->create($subscriptionData);

        // TODO: store data
        $user = User::find(auth()->user()->id);
        $user->storage = $plan->id;
        $user->save();

        return $subscription->toArray();
    }

    public function getAllInvoicesByUser(){
      $invoices = $this->api->invoice->all(
        array(
          "subscription_id" => auth()->user()->subscription->razorpay_subscription_id
        )
      );
      // $invoices = "Test";
      return $invoices;

    }

}
