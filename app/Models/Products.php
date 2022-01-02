<?php
namespace App\Models;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Products extends Model
{
    use HasFactory, SoftDeletes, Translatable;
    protected $table = 'products';
    protected $with = ['translations'];
    protected $guarded = [];
    protected $casts = [
        'is_active' => 'boolean',
    ];
    protected $dates = [
        'special_price_start',
        'special_price_end',
        'start_date',
        'end_date',
        'deleted_at',
    ];
    protected $translatedAttributes = ['name', 'description', 'short_description'];
    public $timestamps = true;

    public function user() {
        return $this->belongsTo(User::class)->withDefault();
    }

    public function getActive() {
        return  $this -> is_active  == 0 ?  'غير مفعل'   : 'مفعل' ;
    }

    public function services() {
        return $this->belongsToMany(Service::class, 'product_categories');
    }
}
