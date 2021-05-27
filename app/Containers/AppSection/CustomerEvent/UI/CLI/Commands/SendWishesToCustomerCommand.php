<?php

namespace App\Containers\AppSection\CustomerEvent\UI\CLI\Commands;


use App\Ship\Parents\Commands\ConsoleCommand;
use Illuminate\Support\Facades\DB;
use App\Containers\AppSection\CustomerEvent\Models\CustomerEvent;

use Carbon\Carbon;

class SendWishesToCustomerCommand extends ConsoleCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'apiato:wishes:sms';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send wishes sms for customer event.';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {

        \Log::info("Cron is working fine! ".Carbon::now()->format('Y-m-d'));

        $customer_events = CustomerEvent::where('event_date', 'LIKE', "%".Carbon::now()->format('-m-d') )->get();
        foreach ($customer_events as $customer_event) {
            if($customer_event->customer->sms_status == true){
                \Log::info("A wishes sms has been sent to " .$customer_event->customer->phone);
                \Log::info("A wishes sms has been sent for " .$customer_event->event->title);
                // \Log::info("A wishes sms has been sent to " .$customer_event->power->trial_ends_at);
                // \Log::info("A wishes sms has been sent to " .$customer_event->power->plan->customer);
                // sendOTP($customer_event->customer->phone, '2222');

                $local_number = ltrim($customer_event->customer->phone, '91');
	              // echo $local_number;
                $brand = $customer_event->customer->user->seller->brand_name;
                $provider = $brand. ' (' .$local_number. ')';

                $message = 'Dear '.$customer_event->customer->first_name.', We wish you a very Happy '.$customer_event->event->title.'. Have a great time! - '.$provider.'. \n Powered by - Webassic IT Solutions.';

                if ($customer_event->customer->user->subscription) {
                  if (Carbon::now()->format('Y-m-d') < $customer_event->customer->user->subscription->ends_at) {

                      // TODO: Send Wishes SMS if has subscription
                      \Log::info("A wishes sms is verified till " .$customer_event->customer->user->subscription->ends_at . " for sending with " .$customer_event->customer->phone);
                      sendSMS($customer_event->customer->phone, $message);
                  }
                }

          }else {
                \Log::info("sms off by seller for " .$customer_event->customer->phone);
          }
        }
    }

}
