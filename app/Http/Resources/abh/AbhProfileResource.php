<?php

namespace App\Http\Resources\abh;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class AbhProfileResource extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        $this->collection->map(function ($profile){
            $profile->load('region','agency','technologies','contacts_phones','contacts_mobiles','contacts_faxes','contacts_emails','projects');
        });

        return [
            'data'=>$this->collection,
            'links' => [
                'self' => 'link-value',
            ],
        ];
    }
}
