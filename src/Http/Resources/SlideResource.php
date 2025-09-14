<?php

namespace Mortezaa97\Sliders\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SlideResource extends JsonResource
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
            'title' => $this->title,
            'url' => $this->url,
            'image' => $this->image ? url($this->image) : null,
            'video' => $this->video ? url($this->video) : null,
            'create_by' => $this->create_by,
        ];
    }
}
