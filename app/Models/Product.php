<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;
class Product extends Model {
    use HasFactory, Translatable, SoftDeletes;
    protected $table = "products";
    protected $guarded  = [];
    protected $with = ['translations'];
    protected $translatedAttributes = ['name', 'description', 'short_description'];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    protected $dates = [
        'special_price_start','special_price_end',
        'start_date', 'end_date', 'deleted_at',
    ];

    public function sections() {
        return $this->belongsTo(Section::class, 'section_id');
    }

    public function users() {
        return $this->belongsTo(User::class, 'user_id');
    }
}