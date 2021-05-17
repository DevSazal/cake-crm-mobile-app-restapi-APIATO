<?php

namespace App\Containers\AppSection\User\Tasks;

use App\Containers\AppSection\User\Data\Repositories\UserRepository;
use App\Containers\AppSection\User\Models\User;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;
use Illuminate\Support\Facades\Hash;

class CreateUserByMobileTask extends Task
{
    protected UserRepository $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(
        bool $isAdmin,
        string $email,
        string $phone,
        string $name = null,
        string $last_name = null,
        string $gender = null,
        string $birth = null
    ): User
    {
        try {
            // create new user with phome
            $otp = createOTP();
            sendOTP($phone, $otp);

            $user = $this->repository->create([
                'password' => Hash::make($phone),
                'email' => $email,
                'phone' => $phone,
                'name' => $name,
                'last_name' => $last_name,
                'otp' => encryptOpenSSL($otp),
                'otp_expire' => \Carbon\Carbon::now()->addMinutes(3),
                'gender' => $gender,
                'birth' => $birth,
                'is_admin' => $isAdmin,
            ]);

        } catch (Exception $e) {
            throw new CreateResourceFailedException();
        }

        return $user;
    }
}
