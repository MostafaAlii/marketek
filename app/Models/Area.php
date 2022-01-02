<?php
namespace App\Models;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory, Translatable;
    protected $table = 'area';
    protected $fillable = ['name', 'city_id', 'created_by', 'updated_by'];
    public $translatedAttributes = ['name'];
    public $timestamps = true;

    public function city(){
        return $this->belongsTo('App\Models\City', 'city_id');
    }
}
