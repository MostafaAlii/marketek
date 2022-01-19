<?php
namespace App\Models;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens, Translatable;
    protected $table = 'users';
    protected $guarded  = [];
    protected $with = ['translations'];
    public $translatedAttributes = ['first_name', 'last_name', 'company_name', 'description', 'address_primary', 'address_secondry'];
    protected $appends = ['image_path', 'barcode_path'];
    public $timestamps = true;

    public function getImagePathAttribute() {
        return asset('uploads/suppliersImage/' . $this->image);
    }

    public function getBarcodePathAttribute() {
        return asset('uploads/supplierBarCode/' . $this->code);
    }

    public function scopeActiveStatus($query) {
        return $query->where('status', 1);
    }
    public function currency(){
        return $this->belongsTo(Currency::class, 'currency_id ');
    }
    public function group(){
        return $this->belongsTo(Group::class, 'group_id');
    }
    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
