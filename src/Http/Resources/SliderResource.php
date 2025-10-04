<?php

declare(strict_types=1);

namespace Mortezaa97\Sliders\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SliderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'code' => $this->code,
            'name' => $this->name,
            'create_by' => $this->create_by,
            'slides' => SlideResource::collection($this->slides),
        ];
    }
}
