<?php

namespace App\Containers\AppSection\CustomerEvent\UI\CLI\Commands;


use App\Ship\Parents\Commands\ConsoleCommand;
use Illuminate\Support\Facades\DB;
use App\Containers\AppSection\CustomerEvent\Models\CustomerEvent;

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

        \Log::info("Cron is working fine! ".date('Y-m-d'));
        // DB::table('customer_events')->get();
        $customer_events = CustomerEvent::where('event_date', 'LIKE', "%".date('-m-d') )->get();
        foreach ($customer_events as $customer_event) {
            if($customer_event->customer->sms_status == true){
                \Log::info("A wishes sms has been sent to " .$customer_event->customer->phone);
                \Log::info("A wishes sms has been sent for " .$customer_event->event->title);
                // \Log::info("A wishes sms has been sent to " .$customer_event->power->trial_ends_at);
                // \Log::info("A wishes sms has been sent to " .$customer_event->power->plan->customer);
                // sendOTP($customer_event->customer->phone, '2222');
                $provider = 'The CakeWall';
                $message = 'Dear '.$customer_event->customer->first_name.', We wish you a very Happy '.$customer_event->event->title.'. Have a great time! - '.$provider.'. \n Powered by - Webassic IT Solutions.';
                sendSMS($customer_event->customer->phone, $message);
          }else {
                \Log::info("sms off by seller for " .$customer_event->customer->phone);
          }
        }
    }

}
