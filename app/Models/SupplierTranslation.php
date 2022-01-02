<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierTranslation extends Model
{
    use HasFactory;
    protected $table = 'supplier_translations';
    protected $fillable = ['first_name', 'last_name', 'company_name', 'address', 'description'];
    public $timestamps = false;
}
