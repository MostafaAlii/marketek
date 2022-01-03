<?php
namespace App\Models;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Product extends Model {
    use Translatable, SoftDeletes;
    protected $table = 'products';
    protected $with = ['translations'];
    protected $translatedAttributes = ['name', 'description', 'short_description'];
    protected $fillable = [
        'user_id', 'slug', 'sku', 'price', 'special_price',
        'special_price_type', 'special_price_start', 'special_price_end', 'selling_price', 'is_active'
    ];
    public $timestamps = true;

    protected $casts = [
        'is_active' => 'boolean',
    ];

    protected $dates = [
        'special_price_start','special_price_end',
        'start_date', 'end_date', 'deleted_at',
    ];

    public function users(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function sections(){
        return $this->belongsTo('App\Models\Section', 'section_id');
    }

    public function getActive(){
        return  $this -> is_active  == 0 ?  'غير مفعل'   : 'مفعل' ;
    }
}
