<?php
namespace App\Http\Controllers\Dashboard\Api;
use App\Http\Controllers\Controller;
use App\Interfaces\Api\ProvincesApiRepositoryInterface;
use Illuminate\Http\Request;
class ProvincesApiController extends Controller {
    protected $Provinces;
    public function __construct(ProvincesApiRepositoryInterface $Provinces) {
        $this->Provinces = $Provinces;
    }

    public function getAllProvinces() {
        return $this->Provinces->getAllProvinces();
    }

    public function getProvinceByID($id) {
        return $this->Provinces->getProvinceByID($id);
    }
    
}
