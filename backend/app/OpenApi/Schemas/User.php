<?php

namespace App\OpenApi\Schemas;

use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: "User",
    title: "User",
    description: "User model",
    required: ["username", "email", "password"],
    properties: [
        new OA\Property(
            property: "id",
            type: "integer",
            example: 1
        ),
        new OA\Property(
            property: "username",
            type: "string",
            example: "John Doe"
        ),
        new OA\Property(
            property: "email",
            type: "string",
            format: "email",
            example: "john@example.com"
        ),
        new OA\Property(
            property: "email_verified_at",
            type: "string",
            format: "date-time",
            example: "2026-08-26 9:17:20"
        ),
        new OA\Property(
            property: "password",
            type: "string",
            format: "password",
            example: "password"
        ),
        new OA\Property(
            property: "status",
            type: "string",
            example: "active"
        ),
        new OA\Property(
            property: "first_name",
            type: "string",
            example: "John"
        ),
        new OA\Property(
            property: "last_name",
            type: "string",
            example: "Doe"
        ),
        new OA\Property(
            property: "phone",
            type: "string",
            example: "09123456789"
        ),
        new OA\Property(
            property: "phone_verified_at",
            type: "string",
            format: "date-time",
            example: "2026-08-26 9:17:20"
        ),
        new OA\Property(
            property: "avatar",
            type: "string",
            format: "date-time",
            example: "http://localhost:8000/storage/upload/users/avatars/user-avatar.png"
        ),
        new OA\Property(
            property: "last_login_at",
            type: "string",
            format: "date-time",
            example: "2026-08-26 9:17:20"
        ),
        new OA\Property(
            property: "created_at",
            type: "string",
            format: "date-time",
            example: "2026-08-26 9:17:20"
        ),
        new OA\Property(
            property: "updated_at",
            type: "string",
            format: "date-time",
            example: "2026-08-26 9:17:20"
        )
    ]
)]
class User
{
    //
}
