<?php

namespace App\Ship\Middlewares\Http;

use App\Ship\Parents\Middlewares\Middleware;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;

class Seller extends Middleware
{
    /**
     * Handle an incoming request for seller.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        if (!empty(Auth::user()->subscription))
        {

            if (Carbon::now()->format('Y-m-d') > Auth::user()->subscription->ends_at)
            {
                // TODO: Membership Verify
                $response = [
                  'error' => 'Your subscription is over! Please renew or upgrade your plan.',
                ];

                return response()->json($response, 401);
            }

            // if (auth()->user()->total_customers >=  auth()->user()->subscription->plan->customer)
            // {
            //     // TODO: Customer Limit Verify
            //     $response = [
            //       'error' => 'Oops! You already reached to your subscription limit.',
            //     ];
            //
            //     // echo auth()->user()->total_customers;
            //     // echo auth()->user()->subscription->plan->customer;
            //
            //     return response()->json($response, 401);
            // }

          /**
            * continue with incoming request.
            */
            return $next($request);

        }else {
            $response = [
              'error' => 'You don\'t have any subscription! Please add a subscription or renew your plan.',
            ];

            return response()->json($response, 401);
        }


    }
}
