<?php

namespace App\Containers\AppSection\User\Tasks;

use App\Containers\AppSection\User\Data\Repositories\UserRepository;
use App\Containers\AppSection\User\Models\User;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class SendOTPforLoginTask extends Task
{
    protected UserRepository $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(string $phone): User
    {
        try {

            $user = $this->repository->findByField('phone', $phone)->first();
            $otp = createOTP();
            $result = sendOTP($user->phone, $otp);
            $userData['otp'] = $otp;
            $user = $this->repository->update($userData, $user->id);

            if ($result == true) {
                $user['sms'] = true;
            }else {
                $user['sms'] = false;
            }

            return $user;

        } catch (Exception $e) {
            throw new NotFoundException();
        }
    }
}
