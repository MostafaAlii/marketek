<?php
namespace App\Models;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Area extends Model
{
    use HasFactory, Translatable;
    protected $table = 'area';
    protected $fillable = ['name', 'provience_id', 'created_by', 'updated_by'];
    public $translatedAttributes = ['name'];
    public $timestamps = true; 

    public function provience(){
        return $this->belongsTo(Provience::class, 'id', 'provience_id');
    }
}
