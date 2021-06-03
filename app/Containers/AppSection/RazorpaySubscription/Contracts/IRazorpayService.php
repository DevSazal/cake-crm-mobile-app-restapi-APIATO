<?php
namespace App\Containers\AppSection\RazorpaySubscription\Contracts;
interface IRazorpayService
{
    public function getAllPlans();
    public function createSubscription($subscriptionData);
    public function getAllSubscriptionInvoices($subscriptonId);

}
