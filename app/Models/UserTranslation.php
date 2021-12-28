<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTranslation extends Model
{
    use HasFactory;
    protected $table = 'user_translations';
    protected $fillable = ['first_name', 'last_name', 'company_name', 'description', 'address_primary', 'address_secondry'];
    public $timestamps = false;
}
