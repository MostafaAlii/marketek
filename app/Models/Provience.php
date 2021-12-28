<?php
namespace App\Models;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Provience extends Model
{
    use HasFactory, Translatable;
    protected $table = 'proviences';
    protected $fillable = ['name', 'country_id', 'created_by', 'updated_by'];
    public $translatedAttributes = ['name'];
    public $timestamps = true;

    public function country(){
        return $this->belongsTo('App\Models\Country', 'country_id');
    }
}
