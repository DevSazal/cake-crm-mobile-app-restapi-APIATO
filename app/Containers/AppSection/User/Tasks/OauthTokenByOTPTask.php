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
            $user['login'] = false;
            if (decryptOpenSSL($user->otp) == $userData['otp'] && $user->otp_expire >= \Carbon\Carbon::now() ) {

              // TODO: loginUsingId
              if(Auth::loginUsingId($user->id)){
                $user['login'] = true;
              }

            }elseif ($user->otp_expire < \Carbon\Carbon::now()) {
              $user['error'] = 'OTP has been expired! Please try within 3 minutes.';
            }

            return $user;

        } catch (Exception $e) {
            throw new NotFoundException();
        }
    }
}
