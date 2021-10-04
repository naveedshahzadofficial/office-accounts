<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InspectionResource extends JsonResource
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
            'inspection_internal_conducted' => $this->inspection_internal_conducted,
            'inspection_verification_entries' => $this->inspection_verification_entries,
            'inspection_pending_3_to_7' => $this->inspection_pending_3_to_7,
            'inspection_pending_more_than_7' => $this->inspection_pending_more_than_7,
            'inspection_miscellaneous_disposed_off' => $this->inspection_miscellaneous_disposed_off,
            'inspection_status' => $this->inspection_status,
            'user_id' => $this->user_id,
            'created_at' => $this->created_at ? $this->created_at->format('d-m-Y') : null,
            'updated_at' => $this->updated_at ? $this->updated_at->format('d-m-Y') : null,
        ];
    }
}
