<?php
namespace App\Models;
use Astrotomic\Translatable\Translatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens, Translatable;
    protected $table = 'users';
    protected $fillable = [
        'phone', 'email', 'discount', 'code', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at',
        'group_id', 'subCategory_id', 'category_id', 'country_id', 'provience_id', 'city_id', 'area_id', 'currency_id',
    ];
    public $translatedAttributes = ['first_name', 'last_name', 'company_name', 'description', 'address_primary', 'address_secondry'];
    public $timestamps = true;

    public function image() {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function currency(){
        return $this->belongsTo(Currency::class, 'currency_id ');
    }
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
