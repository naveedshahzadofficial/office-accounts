<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProcuringAgencieResource extends JsonResource
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
            'agency_procuring_registered' => $this->agency_procuring_registered,
            'public_sector_organization_59e_registered' => $this->public_sector_organization_59e_registered,
            'suppliers_registered' => $this->suppliers_registered,
            'psmu_registered' => $this->psmu_registered,
            'agency_status' => $this->agency_status,
            'user_id' => $this->user_id,
            'created_at' => $this->created_at ? $this->created_at->format('d-m-Y') : null,
            'updated_at' => $this->updated_at ? $this->updated_at->format('d-m-Y') : null,
        ];
    }
}
