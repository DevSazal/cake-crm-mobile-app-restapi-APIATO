<?php

namespace App\Containers\AppSection\User\UI\API\Controllers;

use App\Containers\AppSection\User\Actions\CreateAdminAction;
use App\Containers\AppSection\User\Actions\DeleteUserAction;
use App\Containers\AppSection\User\Actions\FindUserByIdAction;
use App\Containers\AppSection\User\Actions\ForgotPasswordAction;
use App\Containers\AppSection\User\Actions\GetAllAdminsAction;
use App\Containers\AppSection\User\Actions\GetAllClientsAction;
use App\Containers\AppSection\User\Actions\GetAllUsersAction;
use App\Containers\AppSection\User\Actions\GetAuthenticatedUserAction;

use App\Containers\AppSection\User\Actions\RegisterUserAction;
use App\Containers\AppSection\User\Actions\RegisterUserByMobileAction;
use App\Containers\AppSection\User\Actions\RegisterVerifyByOTPAction;
use App\Containers\AppSection\User\Actions\SendOTPforLoginAction;
use App\Containers\AppSection\User\Actions\OauthTokenByOTPAction;

use App\Containers\AppSection\User\Actions\ResetPasswordAction;
use App\Containers\AppSection\User\Actions\UpdateUserAction;
use App\Containers\AppSection\User\UI\API\Requests\CreateAdminRequest;
use App\Containers\AppSection\User\UI\API\Requests\DeleteUserRequest;
use App\Containers\AppSection\User\UI\API\Requests\FindUserByIdRequest;
use App\Containers\AppSection\User\UI\API\Requests\ForgotPasswordRequest;
use App\Containers\AppSection\User\UI\API\Requests\GetAllUsersRequest;
use App\Containers\AppSection\User\UI\API\Requests\GetAuthenticatedUserRequest;

use App\Containers\AppSection\User\UI\API\Requests\RegisterUserRequest;
use App\Containers\AppSection\User\UI\API\Requests\RegisterUserByMobileRequest;
use App\Containers\AppSection\User\UI\API\Requests\RegisterVerifyByOTPRequest;
use App\Containers\AppSection\User\UI\API\Requests\SendOTPforLoginRequest;
use App\Containers\AppSection\User\UI\API\Requests\OauthTokenByOTPRequest;

use App\Containers\AppSection\User\UI\API\Requests\ResetPasswordRequest;
use App\Containers\AppSection\User\UI\API\Requests\UpdateUserRequest;
use App\Containers\AppSection\User\UI\API\Transformers\UserPrivateProfileTransformer;
use App\Containers\AppSection\User\UI\API\Transformers\UserTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class Controller extends ApiController
{
    public function registerUser(RegisterUserRequest $request): array
    {
        $user = app(RegisterUserAction::class)->run($request);
        return $this->transform($user, UserTransformer::class);
    }

    // TODO: Sign Up with Mobile Number
    public function registerUserByMobile(RegisterUserByMobileRequest $request): array
    {
        $user = app(RegisterUserByMobileAction::class)->run($request);
        return $this->transform($user, UserTransformer::class);
    }

    // TODO: Verify By OTP to active registered user
    public function registerVerifyByOTP(RegisterVerifyByOTPRequest $request): JsonResponse
    {
        $user = app(RegisterVerifyByOTPAction::class)->run($request);
        if ($user->error)
        {
          // TODO: OTP Timer Verify
          $response = [
            'error' => $user->error,
          ];

          return response()->json($response, 401);
        }

        return response()->json($user, 202);
    }

    // TODO: Send OTP to login with mobile
    public function sendOTPforLogin(SendOTPforLoginRequest $request): JsonResponse
    {
        $user = app(SendOTPforLoginAction::class)->run($request);

        // return $this->noContent(202);
        if ($user->sms == false) {

            $response = [
              'error' => 'Oops! We could not send you OTP',
            ];
            return response()->json($response, 412);
        }

        $response = [
          'success' => 'The OTP has been sent',
        ];

        return response()->json($response, 202);
    }

    // TODO: make OAUTH TOKEN for OTP LOGIN
    public function oauthTokenByOTP(OauthTokenByOTPRequest $request): JsonResponse
    {
        $user = app(OauthTokenByOTPAction::class)->run($request);

        if ($user->error)
        {
          // TODO: OTP Timer Verify
          $response = [
            'error' => $user->error,
          ];

          return response()->json($response, 401);
        }

        if (!auth()->check()) {

            $response = [
              'message' => 'Invalid credentials',
            ];
            return response()->json($response, 402);
        }

        $accessToken = auth()->user()->createToken('authTokenOTP')->accessToken;

        $response = [
          'token_type' =>  'Bearer',
          'access_token' => $accessToken,
        ];

        return response()->json($response, 201);

    }

    public function createAdmin(CreateAdminRequest $request): array
    {
        $admin = app(CreateAdminAction::class)->run($request);
        return $this->transform($admin, UserTransformer::class);
    }

    public function updateUser(UpdateUserRequest $request): array
    {
        $user = app(UpdateUserAction::class)->run($request);
        return $this->transform($user, UserTransformer::class);
    }

    public function deleteUser(DeleteUserRequest $request): JsonResponse
    {
        app(DeleteUserAction::class)->run($request);
        return $this->noContent();
    }

    public function getAllUsers(GetAllUsersRequest $request): array
    {
        $users = app(GetAllUsersAction::class)->run();
        return $this->transform($users, UserTransformer::class);
    }

    public function getAllClients(GetAllUsersRequest $request): array
    {
        $users = app(GetAllClientsAction::class)->run();
        return $this->transform($users, UserTransformer::class);
    }

    public function getAllAdmins(GetAllUsersRequest $request): array
    {
        $users = app(GetAllAdminsAction::class)->run();
        return $this->transform($users, UserTransformer::class);
    }

    public function findUserById(FindUserByIdRequest $request): array
    {
        $user = app(FindUserByIdAction::class)->run($request);
        return $this->transform($user, UserTransformer::class);
    }

    public function getAuthenticatedUser(GetAuthenticatedUserRequest $request): array
    {
        $user = app(GetAuthenticatedUserAction::class)->run();
        return $this->transform($user, UserPrivateProfileTransformer::class);
    }

    public function resetPassword(ResetPasswordRequest $request): JsonResponse
    {
        app(ResetPasswordAction::class)->run($request);
        return $this->noContent(204);
    }

    public function forgotPassword(ForgotPasswordRequest $request): JsonResponse
    {
        app(ForgotPasswordAction::class)->run($request);
        return $this->noContent(202);
    }
}
