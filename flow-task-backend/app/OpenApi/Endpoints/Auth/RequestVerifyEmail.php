<?php

namespace App\OpenApi\Endpoints\Auth;

use OpenApi\Attributes as OA;

#[OA\Post(
    path: "/email/verification-notification",
    operationId: "sendEmailVerificationNotification",
    description: "Send a new email verification notification to the authenticated user.",
    summary: "Send email verification link",
    tags: ["Auth"],
    responses: [
        new OA\Response(
            response: 200,
            description: "Successful operation",
            content: new OA\JsonContent(
                ref: "#/components/schemas/EmailVerificationNotificationResponse"
            )
        ),
        new OA\Response(
            response: 302,
            description: "User's email is already verified. Redirects to the dashboard."
        ),
        new OA\Response(
            response: 401,
            description: "Unauthenticated"
        ),
        new OA\Response(
            response: 429,
            description: "Too many requests"
        ),
    ]
)]
class RequestVerifyEmail
{
    //
}
