<?php

namespace App\Containers\AppSection\RazorpaySubscription\UI\API\Controllers;

use App\Containers\AppSection\Razorpaysubscription\UI\API\Requests\CreateSubscriptionRequest;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Support\Facades\Config;
use App\Containers\AppSection\RazorpaySubscription\Contracts\IRazorpayService ;

/**
 * Class Controller
 *
 * @package App\Containers\RazorpaySubscription\UI\API\Controllers
 */
class Controller extends ApiController
{
    public function __construct(IRazorpayService $razorpayService)
    {
        $this->razorpayService = $razorpayService;
    }
    /**
     * List all active plans
     * @return \Illuminate\Http\JsonResponse
     */
    public function plans()
    {
        $rzrActivePlanIds = Config::get('razorpaysubscription.razorpay.active_plans');
        $plans = $this->razorpayService->getAllPlans();//$api->plan->all();
        $activePlans = array();
        foreach($plans->items as $plan){
            if(in_array($plan['id'], $rzrActivePlanIds)){
                $activePlans[] = $plan->toArray();
            }
        }
        return response()->json($activePlans);
    }

    public function create(CreateSubscriptionRequest $request)
    {
        $rzrSubscription = $request->toArray();
        $subscription = $this->razorpayService->createSubscription($rzrSubscription);
        return response()->json($subscription);
    }

}
