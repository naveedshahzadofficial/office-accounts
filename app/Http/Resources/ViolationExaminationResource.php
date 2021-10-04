<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ViolationExaminationResource extends JsonResource
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
            'violation_website' => $this->violation_website,
            'violation_newspaper' => $this->violation_newspaper,
            'violation_identified' => $this->violation_identified,
            'violation_removed' => $this->violation_removed,
            'violation_pending' => $this->violation_pending,
            'violation_fileviolation_file' => $this->violation_fileviolation_file,
            'violation_status' => $this->violation_status,
            'user_id' => $this->user_id,
            'created_at' => $this->created_at ? $this->created_at->format('d-m-Y') : null,
            'updated_at' => $this->updated_at ? $this->updated_at->format('d-m-Y') : null,
        ];
    }
}
