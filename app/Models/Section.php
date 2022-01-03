<?php
namespace App\Models;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Section extends Model implements TranslatableContract
{
    use HasFactory, Translatable;
    protected $table = 'sections';
    protected $fillable = ['name', 'created_by', 'updated_by'];
    public $translatedAttributes = ['name'];
    public $timestamps = true;
}
