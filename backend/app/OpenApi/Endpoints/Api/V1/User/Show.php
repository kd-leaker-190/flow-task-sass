<?php

namespace App\OpenApi\Endpoints\Api\V1\User;

use OpenApi\Attributes as OA;

#[OA\Get(
    path: "/api/v1/user",
    description: "Returns authenticated user data",
    summary: "Get authenticated user data",
    tags: ["User"],
    responses: [
        new OA\Response(
            response: 200,
            description: "Successful operation",
            content: new OA\JsonContent(
                ref: "#/components/schemas/UserResponse"
            )
        ),
        new OA\Response(
            response: 401,
            description: "Unauthenticated"
        )
    ]
)]
class Show
{
    //
}
