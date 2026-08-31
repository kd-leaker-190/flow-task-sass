<?php

namespace App\OpenApi;

use OpenApi\Attributes as OA;

#[OA\Info(
    version: "1.0.0",
    description: "FlowTask V1 Api Documentation",
    title: "FlowTask SasS",
    contact: new OA\Contact(
        email: "shakib.zeidi.dev@gmail.com"
    ),
    license: new OA\License(
        name: "Apache 2.0",
        url: "https://www.apache.org/licenses/LICENSE-2.0.html"
    ),
    x: [
        "logo" => [
            "url" => "https://via.placeholder.com/190x90.png?text=L5-Swagger"
        ]
    ],
)]
#[OA\Server(
    url: "http://localhost:8000",
    description: "Local development server"
)]
#[OA\Server(
    url: "http://127.0.0.1:8000",
    description: "Local development server"
)]
#[OA\Server(
    url: "https://api.example.com",
    description: "Production server"
)]
class OpenApi
{
    //
}
