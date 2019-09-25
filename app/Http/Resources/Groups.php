<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class Groups extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $dataArray = array();

        foreach ($this->collection as $value) {
            $dataArray[] = [
                'name' => $value->name,
                'country' => $value->country,
                'club_logo' => $value->club_logo,
            ];        
        }

        return $dataArray;
    }
}
