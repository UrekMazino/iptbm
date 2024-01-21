<?php

namespace App\Http\Resources\iptbm;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class IptbmProfileResource extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $this->collection->map(function ($profile){
            $profile->load(['technologies','agency','contact_mobile','contact_phone','contact_fax','contact_email']);
        });
        return [
            'data'=>$this->collection
        ];
    }
}
