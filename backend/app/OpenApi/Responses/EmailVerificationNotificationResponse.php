<?php

namespace App\OpenApi\Responses;

use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: "EmailVerificationNotificationResponse",
    allOf: [
        new OA\Schema(
            ref: "#/components/schemas/ApiResponse"
        ),
    ]
)]
class EmailVerificationNotificationResponse
{
    //
}
