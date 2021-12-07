<?php
namespace App\Models;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Currency extends Model
{
    use HasFactory, Translatable;
    protected $table = 'currencies';
    protected $fillable = ['name', 'currency_symbol', 'created_by', 'updated_by'];
    public $translatedAttributes = ['name'];
    public $timestamps = true; 
}
