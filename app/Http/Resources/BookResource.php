<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\CategoryResource;
class BookResource extends JsonResource
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
             'id'=>$this->id,
            'name' => $this->name,
            'details' => $this->details,
            'author_name' => $this->author_name,
            'price' => $this->price,
            'numberOfPage' => $this->numberOfPage,
            'languages' => $this->languages,
            'image' => $this->image ? url('/storage/'.$this->image) : url("not found"),
            'isFavorite'=> $this->isFav(),
            'categories_id' => new CategoryResource($this->Categories),

        ];
    }
}
