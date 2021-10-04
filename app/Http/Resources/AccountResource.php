<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AccountResource extends JsonResource
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
            'account_issued' => $this->account_issued,
            'account_activated' => $this->account_activated,
            'account_deactivated' => $this->account_deactivated,
            'account_deactivated_file' => $this->account_deactivated_file,
            'account_blocked_till_date' => $this->account_blocked_till_date,
            'account_status' => $this->account_status,
            'user_id' => $this->user_id,
            'created_at' => $this->created_at ? $this->created_at->format('d-m-Y') : null,
            'updated_at' => $this->updated_at ? $this->updated_at->format('d-m-Y') : null,
        ];
    }
}
