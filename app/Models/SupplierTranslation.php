<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class SupplierTranslation extends Model
{
    protected $table = 'supplier_translations';
    protected $fillable = ['first_name', 'last_name', 'company_name', 'address', 'discription'];
    public $timestamps = false;
}
