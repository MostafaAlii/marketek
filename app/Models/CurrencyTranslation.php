<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurrencyTranslation extends Model
{
    use HasFactory;
    protected $table = 'currency_translations';
    protected $fillable = ['name'];
    public $timestamps = false;
}
