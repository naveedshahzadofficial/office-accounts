<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BlacklistingResource extends JsonResource
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
            'blacklist_order' => $this->blacklist_order,
            'blacklisting_case_disposed_off' => $this->blacklisting_case_disposed_off,
            'blacklisting_pending_15_to_30' => $this->blacklisting_pending_15_to_30,
            'blacklisting_pending_more_than_30' => $this->blacklisting_pending_more_than_30,
            'blacklisting_status' => $this->blacklisting_status,
            'user_id' => $this->user_id,
            'created_at' => $this->created_at ? $this->created_at->format('d-m-Y') : null,
            'updated_at' => $this->updated_at ? $this->updated_at->format('d-m-Y') : null,

        ];
    }
}
