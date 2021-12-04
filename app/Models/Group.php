<?php
namespace App\Models;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as ContractsTranslatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Group extends Model implements ContractsTranslatable
{
    use HasFactory, Translatable;
    protected $table = 'groups';
    protected $fillable = ['name', 'created_by', 'updated_by'];
    public $translatedAttributes = ['name'];
    public $timestamps = true;

    public  function getStatus(){
        echo ($this->status == 0) ?  '<button class="btn btn-outline-danger">'.trans('dashboard/general.not_active').'</button>' : '<button class="btn btn-outline-success">'.trans('dashboard/general.active').'</button>';
     } 
}
