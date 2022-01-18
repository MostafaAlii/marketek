<?php
namespace App\Http\Resources\Supplier;
use Illuminate\Http\Resources\Json\JsonResource;
class SupplierProfileResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'                =>          $this->id,
            'image'             =>          $this->image_path,
            'phone'        =>          $this->phone,
            'email'        =>          $this->email,
            'discount'        =>          $this->discount,
            'location'        =>          $this->location,
            'category_id'        =>          $this->category_id,
            'subCategory_id'        =>          $this->subCategory_id,
            'country_id'        =>          $this->country_id,
            'provience_id'        =>          $this->provience_id,
            'city_id'        =>          $this->city_id,
            'area_id'        =>          $this->area_id,
            'currency_id'        =>          $this->currency_id,
        ];
    }
}
