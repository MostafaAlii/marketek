<?php
namespace App\Models;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Supplier extends Model
{
    use HasFactory, Translatable;
    protected $table = 'suppliers';
    protected $guarded = [];
    public $translatedAttributes = ['first_name', 'last_name', 'company_name', 'description', 'address_primary', 'address_secondry'];
    public $timestamps = true; 

    public function image() {
        return $this->morphOne(Image::class, 'imageable');
    }
}
