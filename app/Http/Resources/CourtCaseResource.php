<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CourtCaseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'case_initiated' => $this->case_initiated,
            'case_disposed_off' => $this->case_disposed_off,
            'case_status' => $this->case_status,
            'user_id' => $this->user_id,
            'created_at' => $this->created_at ? $this->created_at->format('d-m-Y') : null,
            'updated_at' => $this->updated_at ? $this->updated_at->format('d-m-Y') : null,

        ];
    }
}
