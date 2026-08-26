<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WorkspaceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'bio' => $this->bio,
            'logo' => $this->logo,
            'is_public' => $this->is_public,
            'status' => $this->status?->value,
            'deleted_at' => $this->deleted_at?->value,
            'created_at' => $this->created_at?->value,
            'updated_at' => $this->updated_at?->value,
            'owner' => new UserResource($this->whenLoaded('owner')),
        ];
    }
}
