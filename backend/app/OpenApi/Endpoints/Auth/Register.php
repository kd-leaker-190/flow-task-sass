<?php

namespace App\OpenApi\Endpoints\Auth;

use OpenApi\Attributes as OA;

#[OA\Post(
    path: "/register",
    description: "Register a user with username, email and password",
    summary: "Register user",
    requestBody: new OA\RequestBody(
        description: "User object that needs to register",
        required: true,
        content: new OA\JsonContent(
            required: ["username", "email", "password"],
            properties: [
                new OA\Property(
                    property: "username",
                    type: "string",
                    example: "john_123"
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
                    example: "password"
                ),

                new OA\Property(
                    property: "password_confirmation",
                    type: "string",
                    format: "password",
                    example: "password"
                )
            ]
        )
    ),
    tags: ["Auth"],
    responses: [
        new OA\Response(
            response: 201,
            description: "Successful operation",
            content: new OA\JsonContent(
                ref: "#/components/schemas/UserResponse"
            )
        ),
        new OA\Response(
            response: 422,
            description: "Validation error"
        )
    ]
)]
class Register
{
    //
}
