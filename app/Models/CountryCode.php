<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryCode extends Model
{
    use HasFactory;
    protected $table = 'country_codes';
    protected $guarded  = [];
    public $timestamps = true;

    protected $appends = ['image_path'];

    public function getImagePathAttribute() {
        return  asset('public/uploads/countryFlags/') . $this->image;
    }
}
