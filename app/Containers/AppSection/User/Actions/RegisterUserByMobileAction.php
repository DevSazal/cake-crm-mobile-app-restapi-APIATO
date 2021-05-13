<?php

namespace App\Containers\AppSection\User\Actions;

use App\Containers\AppSection\User\Events\UserRegisteredEvent;
use App\Containers\AppSection\User\Mails\UserRegisteredMail;
use App\Containers\AppSection\User\Models\User;
use App\Containers\AppSection\User\Notifications\UserRegisteredNotification;

use App\Containers\AppSection\User\Tasks\CreateUserByMobileTask;
use App\Containers\AppSection\User\UI\API\Requests\RegisterUserByMobileRequest;

use App\Ship\Parents\Actions\Action;
use Illuminate\Contracts\Bus\Dispatcher;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class RegisterUserByMobileAction extends Action
{
    public function run(RegisterUserByMobileRequest $request): User
    {
        $user = app(CreateUserByMobileTask::class)->run(
            false,
            $request->email,
            $request->phone,
            $request->name,
            $request->last_name,
            $request->gender,
            $request->birth
        );

        Mail::send(new UserRegisteredMail($user));
        Notification::send($user, new UserRegisteredNotification($user));
        app(Dispatcher::class)->dispatch(new UserRegisteredEvent($user));

        return $user;
    }
}
