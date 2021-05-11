<?php

namespace App\Containers\AppSection\Event\Actions;

use App\Containers\AppSection\Event\Models\Event;
use App\Containers\AppSection\Event\Tasks\UpdateEventTask;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;

class UpdateEventAction extends Action
{
    public function run(Request $request): Event
    {
        $data = $request->sanitizeInput([
            // add your request data here
            'title',
            'sms_template',
        ]);

        return app(UpdateEventTask::class)->run($request->id, $data);
    }
}
