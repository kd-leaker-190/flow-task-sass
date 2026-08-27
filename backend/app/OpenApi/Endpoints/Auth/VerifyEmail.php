<?php

namespace App\OpenApi\Endpoints\Auth;

use OpenApi\Attributes as OA;

#[OA\Get(
    path: "/verify-email/{id}/{hash}",
    operationId: "verifyEmail",
    description: "Verify the authenticated user's email address.",
    summary: "Verify email address",
    tags: ["Auth"],
    parameters: [
        new OA\Parameter(
            name: "id",
            description: "User ID",
            in: "path",
            required: true,
            schema: new OA\Schema(
                type: "integer",
                example: 1
            )
        ),
        new OA\Parameter(
            name: "hash",
            description: "Signed email verification hash",
            in: "path",
            required: true,
            schema: new OA\Schema(
                type: "string",
                example: "a8f5f167f44f4964e6c998dee827110c"
            )
        ),
    ],
    responses: [
        new OA\Response(
            response: 302,
            description: "Email verified successfully. Redirects to the frontend dashboard."
        ),
        new OA\Response(
            response: 401,
            description: "Unauthenticated"
        ),
        new OA\Response(
            response: 403,
            description: "Invalid or expired verification link"
        ),
        new OA\Response(
            response: 429,
            description: "Too many verification attempts"
        ),
    ]
)]
class VerifyEmail
{
    //
}
