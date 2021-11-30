<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ComplaintsRedressalResource extends JsonResource
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
            'complaint_disposed' => $this->complaint_disposed,
            'complaint_pending_more_than_7' => $this->complaint_pending_more_than_7,
            'complaint_total_other_more_than_7' => $this->complaint_total_other_more_than_7,
            'complaint_pending_other_more_than_7' => $this->complaint_pending_other_more_than_7,
            'complaint_status' => $this->complaint_status,
            'user_id' => $this->user_id,
            'created_at' => $this->created_at ? $this->created_at->format('d-m-Y') : null,
            'updated_at' => $this->updated_at ? $this->updated_at->format('d-m-Y') : null,
        ];
    }
}
