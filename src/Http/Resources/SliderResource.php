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
            'code' => $this->code,
            'name' => $this->name,
            'created_by' => $this->created_by,
            'slides' => SlideResource::collection($this->whenLoaded('slides')),
        ];
    }
}
