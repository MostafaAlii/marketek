<?php
namespace App\Http\Resources\General;
use Illuminate\Http\Resources\Json\JsonResource;
class CountryCodeResourse extends JsonResource
{
    public function toArray($request) {
        return [
            'id'                =>          $this->id,
            'image'             =>          $this->image_path,
            'country_code'        =>          $this->country_code,
        ];
    }
}
