<?php
namespace App\Models;
use Astrotomic\Translatable\Contracts\Translatable as ContractsTranslatable;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model implements ContractsTranslatable
{
    use HasFactory, Translatable;
    protected $table = 'groups';
    protected $fillable = ['name', 'created_by', 'updated_by'];
    public $translatedAttributes = ['name'];
    public $timestamps = true;

    public function scopeGetLang() {
        return $this->getLanguageFromCountryBasedLocale();
    }
}
