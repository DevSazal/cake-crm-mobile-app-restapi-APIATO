<?php

namespace App\Containers\AppSection\CustomerEvent\Jobs;

use App\Ship\Parents\Jobs\Job;

 class SenderWishesJob extends Job
 {
     private $recipients;

     public function __construct(array $recipients)
     {
         $this->recipients = $recipients;
     }

     public function handle()
     {
         foreach ($this->recipients as $recipient) {
             // do whatever you like
         }
     }
 }
