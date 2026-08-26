<?php

namespace App\OpenApi\Endpoints\Auth;

use OpenApi\Attributes as OA;

#[OA\Post(
    path: "/forgot-password",
    description: "Sends a password-reset email containing password-reset link",
    summary: "Send reset-password link",
    requestBody: new OA\RequestBody(
        description: "Credentials required for forgot password",
        required: true,
        content: new OA\JsonContent(
            required: ["email"],
            properties: [
                new OA\Property(
                    property: "email",
                    type: "string",
                    format: "email",
                    example: "john@example.com"
                ),
            ]
        )
    ),
    tags: ["Auth"],
    responses: [
        new OA\Response(
            response: 200,
            description: "Successful operation",
            content: new OA\JsonContent(
                ref: "#/components/schemas/ForgotPasswordResponse"
            )
        ),
        new OA\Response(
            response: 422,
            description: "Validation error"
        )
    ]
)]
class ForgotPassword
{
    //
}
