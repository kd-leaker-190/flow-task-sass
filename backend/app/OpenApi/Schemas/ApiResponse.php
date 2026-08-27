<?php

namespace App\OpenApi\Schemas;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: "ApiResponse",
    required: ["status", "message", "data"],
    properties: [
        new OA\Property(
            property: "status",
            type: "string",
            example: "success"
        ),
        new OA\Property(
            property: "message",
            type: "string",
            example: "Successful operation message"
        ),
        new OA\Property(
            property: "data",
            type: "object",
            nullable: true
        ),
    ],
    type: "object"
)]
class ApiResponse
{
    //
}
