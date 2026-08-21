<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function show(Request $request): JsonResponse
    {
        $user = $request->user()->load('profile');

        return ApiResponse::success(
            data: new UserResource($user),
        );
    }

    public function updateInfo(Request $request): JsonResponse
    {
        $user = $request->user();

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255', Rule::unique('users', 'name')->ignore($user->id)],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users', 'email')->ignore($user->id)],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);

        if ($validator->fails()) {
            return ApiResponse::error(
                errors: $validator->errors(),
                message: 'Form validation error, please check entries',
                code: 422,
            );
        }

        $data = $validator->validated();

        if (empty($data['password'])) {
            unset($data['password']);
        }

        $user->update($data);

        return ApiResponse::success(
            data: new UserResource($user->fresh()),
            message: 'Your info has been updated',
        );
    }

    public function updateProfile(Request $request): JsonResponse
    {
        $user = $request->user();

        $validator = Validator::make($request->all(), [
            'first_name' => ['nullable', 'string', 'max:255'],
            'last_name' => ['nullable', 'string', 'max:255'],
            'avatar' => ['nullable', 'image', 'mimes:jpeg,jpg,png', 'max:2048'],
            'bio' => ['nullable', 'string'],
        ]);

        if ($validator->fails()) {
            return ApiResponse::error(
                errors: $validator->errors(),
                message: 'Form validation error, please check entries',
                code: 422,
            );
        }

        $data = $validator->validated();

        // Handle avatar upload.
        if ($request->hasFile('avatar')) {
            if ($user->profile()->avatar) {
                Storage::disk('local')->delete($user->profile()->avatar);
            }

            $data['avatar'] = $request->file('avatar')->store(
                'upload/users/avatars',
                'local'
            );
        }

        $user->profile()->update($data);

        return ApiResponse::success(
            data: new UserResource($user->fresh()),
            message: 'Your info has been updated',
        );
    }

    public function destroy(Request $request): JsonResponse
    {
        $user = $request->user();

        if ($user->profile()->avatar) {
            Storage::disk('local')->delete($user->profile()->avatar);
        }

        $user->delete();

        return ApiResponse::success(
            message: 'Your Account has been deleted',
        );
    }
}
