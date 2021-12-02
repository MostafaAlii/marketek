<?php
namespace App\Models;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as ContractsTranslatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Section extends Model implements ContractsTranslatable
{
    use HasFactory, Translatable;
    protected $table = 'sections';
    public $translatedAttributes = ['name'];
    public $timestamps = true;
}
