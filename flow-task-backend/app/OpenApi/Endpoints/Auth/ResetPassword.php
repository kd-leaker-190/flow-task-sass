<?php

namespace App\OpenApi\Endpoints\Auth;

use OpenApi\Attributes as OA;

#[OA\Post(
    path: "/reset-password",
    description: "Reset user password",
    summary: "Reset user password",
    requestBody: new OA\RequestBody(
        description: "Credentials required for reset password",
        required: true,
        content: new OA\JsonContent(
            required: ["token", "email", "password", "password_confirmation"],
            properties: [
                new OA\Property(
                    property: "token",
                    type: "string",
                    example: "ABCDEFGHIJKLMNOPQRSTUVWXYZ-abcdefghijklmnopqrstuvwxyz-1234567890"
                ),
                new OA\Property(
                    property: "email",
                    type: "string",
                    format: "email",
                    example: "john@example.com"
                ),
                new OA\Property(
                    property: "password",
                    type: "string",
                    format: "password",
                    example: "new_password"
                ),
                new OA\Property(
                    property: "password_confirmation",
                    type: "string",
                    format: "password",
                    example: "new_password"
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
                ref: "#/components/schemas/ResetPasswordResponse"
            )
        ),
        new OA\Response(
            response: 422,
            description: "Validation error"
        )
    ]
)]
class ResetPassword
{
    //
}
