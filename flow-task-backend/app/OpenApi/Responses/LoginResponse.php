<?php

namespace App\OpenApi\Responses;

use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: "LoginResponse",
    allOf: [
        new OA\Schema(
            ref: "#/components/schemas/ApiResponse"
        ),
        new OA\Schema(
            properties: [
                new OA\Property(
                    property: "data",
                    ref: "#/components/schemas/User"
                ),
            ]
        ),
    ]
)]
class LoginResponse
{
    //
}
