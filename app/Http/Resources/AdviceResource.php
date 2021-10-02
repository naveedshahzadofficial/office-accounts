<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AdviceResource extends JsonResource
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
            'advice_issued' => $this->advice_issued,
            'advice_pending_3_to_10' => $this->advice_pending_3_to_10,
            'advice_pending_more_than_10' => $this->advice_pending_more_than_10,
            'user_id' => $this->user_id,
            'advice_status' => $this->advice_status,
            'created_at' => $this->created_at ? $this->created_at->format('d-m-Y') : null,
            'updated_at' => $this->updated_at ? $this->updated_at->format('d-m-Y') : null,


        ];
    }
}
