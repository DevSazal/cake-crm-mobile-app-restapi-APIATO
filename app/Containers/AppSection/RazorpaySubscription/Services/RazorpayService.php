<?php
namespace App\Containers\AppSection\RazorpaySubscription\Services;

use App\Containers\AppSection\RazorpaySubscription\Contracts\IRazorpayService;
use Illuminate\Support\Facades\Config;
use Razorpay\Api\Api;

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
        $subscription  = $this->api->subscription->create($subscriptionData);
        return $subscription->toArray();
    }

}
