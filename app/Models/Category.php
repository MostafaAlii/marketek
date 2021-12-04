<?php
namespace App\Models;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory, Translatable;
    protected $table = "categories";

    protected $fillable = ['parent_id', 'group_id', 'created_by', 'updated_by'];
    protected $with = ['translations'];
    protected $hidden = ['translations'];
    public $translatedAttributes = ['name'];
    public $timestamps = true;


    public  function getStatus() {
        echo ($this->status == 0) ?  '<button class="btn btn-outline-danger">'.trans('dashboard/general.not_active').'</button>' : '<button class="btn btn-outline-success">'.trans('dashboard/general.active').'</button>';
    }
}
