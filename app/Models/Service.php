<?php
namespace App\Models;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Service extends Model
{
    use HasFactory, Translatable;
    protected $table = 'services';
    protected $fillable = ['name', 'created_by', 'updated_by'];
    public $translatedAttributes = ['name'];
    public $timestamps = true;
}
