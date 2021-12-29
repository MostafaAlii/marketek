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
    protected $guarded = [];
    public $translatedAttributes = ['first_name', 'last_name', 'company_name', 'description', 'address_primary', 'address_secondry'];
    public $timestamps = true;

    public function image() {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function scopeActiveStatus($query) {
        return $query->where('status', 1);
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
