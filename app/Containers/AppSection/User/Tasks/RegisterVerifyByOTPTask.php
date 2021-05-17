<?php

namespace App\Containers\AppSection\User\Tasks;

use App\Containers\AppSection\User\Data\Repositories\UserRepository;
use App\Containers\AppSection\User\Models\User;
use App\Ship\Exceptions\InternalErrorException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Hash;

class RegisterVerifyByOTPTask extends Task
{
    protected UserRepository $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $userData, $userId): User
    {
        if (empty($userData)) {
            throw new UpdateResourceFailedException('Inputs are empty.');
        }

        try {

            $user = $this->repository->find($userId);
            if (decryptOpenSSL($user->otp) == $userData['otp'] && $user->otp_expire >= \Carbon\Carbon::now() ) {
              // active user if OTP match
              $userData['active'] = true;
              $userData['otp'] = $user->otp;
              $user = $this->repository->update($userData, $userId);
            }elseif ($user->otp_expire < \Carbon\Carbon::now()) {
              $user['error'] = 'OTP has been expired! Please try within 3 minutes.';
            }elseif (decryptOpenSSL($user->otp) != $userData['otp']) {
              $user['error'] = 'OTP is not matched';
            }


        } catch (ModelNotFoundException $exception) {
            throw new NotFoundException('User Not Found.');
        } catch (Exception $exception) {
            throw new InternalErrorException();
        }

        return $user;
    }
}
