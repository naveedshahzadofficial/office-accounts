<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TenderFeeResource extends JsonResource
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
            'fee_document_examined' => $this->fee_document_examined,
            'fee_violations_identified' => $this->fee_violations_identified,
            'fee_verification_deposit' => $this->fee_verification_deposit,
            'fee_login_ids_activated' => $this->fee_login_ids_activated,
            'fee_login_ids_deactivated' => $this->fee_login_ids_deactivated,
            'fee_status' => $this->fee_status,
            'user_id' => $this->user_id,
            'created_at' => $this->created_at ? $this->created_at->format('d-m-Y') : null,
            'updated_at' => $this->updated_at ? $this->updated_at->format('d-m-Y') : null,
        ];
    }
}
