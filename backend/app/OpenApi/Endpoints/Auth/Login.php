<?php

namespace App\OpenApi\Endpoints\Auth;

use OpenApi\Attributes as OA;

#[OA\Post(
    path: "/login",
    description: "Login a user with email and password",
    summary: "Login user",
    requestBody: new OA\RequestBody(
        description: "User object that needs to log in",
        required: true,
        content: new OA\JsonContent(
            required: ["email", "password"],
            properties: [
                new OA\Property(property: "email", type: "string", format: "email", example: "john@example.com"),
                new OA\Property(property: "password", type: "string", format: "password", example: "password")
            ]
        )
    ),
    tags: ["Auth"],
    responses: [
        new OA\Response(
            response: 200,
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
class Login
{
    //
}
