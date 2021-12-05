<?php
namespace App\Models;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory, Translatable;
    protected $table = "categories";

    protected $fillable = ['parent_id', 'group_id', 'created_by', 'updated_by'];
    protected $with = ['translations'];
    protected $hidden = ['translations'];
    public $translatedAttributes = ['name'];
    public $timestamps = true;

    public function scopeParent($query) {
        return $query->whereNull('parent_id');
    }

    public function scopeChild($query) {
        return $query->whereNotNull('parent_id');
    }

    public function _parent(){
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function Groups() {
        return $this->belongsTo('groups', 'group_id');
    }
}
