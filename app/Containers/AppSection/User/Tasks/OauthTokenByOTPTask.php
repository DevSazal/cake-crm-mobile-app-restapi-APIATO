<?php

namespace App\Containers\AppSection\User\Tasks;

use App\Containers\AppSection\User\Data\Repositories\UserRepository;
use App\Containers\AppSection\User\Models\User;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

use Illuminate\Support\Facades\Auth;

class OauthTokenByOTPTask extends Task
{
    protected UserRepository $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $userData): User
    {
        try {
            $user = $this->repository->findByField('phone', $userData['phone'])->first();
            $user['login'] == false;
            if ($user->otp == $userData['otp']) {

              // TODO: loginUsingId
              if(Auth::loginUsingId($user->id)){
                $user['login'] == true;
              }

            }

            return $user;

        } catch (Exception $e) {
            throw new NotFoundException();
        }
    }
}
