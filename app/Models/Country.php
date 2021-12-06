<?php
namespace App\Models;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Country extends Model
{
    use HasFactory, Translatable;
    protected $table = 'countries';
    protected $fillable = ['name', 'country_logo', 'created_by', 'updated_by'];
    public $translatedAttributes = ['name'];
    public $timestamps = true;
}
