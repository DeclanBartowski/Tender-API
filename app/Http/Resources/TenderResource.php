<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TenderResource extends JsonResource
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
            'external_id' => $this->external_id,
            'number' => $this->number,
            'status' => $this->status,
            'name' => $this->name,
            'date' => $this->date->format('d.m.Y H:i:s'),
        ];
    }
}
