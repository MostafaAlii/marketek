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
    public $translatedAttributes = ['first_name', 'last_name', 'company_name'];
    public $timestamps = true; 

    public function avatar() {
        return $this->morphOne(Avatar::class, 'avatarable');
    }
}
