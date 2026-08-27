<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(Request $request)
    {
        return $this->successResponse(
            data: new UserResource($request->user()),
        );
    }
}
