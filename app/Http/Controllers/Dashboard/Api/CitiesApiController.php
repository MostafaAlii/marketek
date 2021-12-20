<?php
namespace App\Http\Controllers\Dashboard\Api;
use App\Http\Controllers\Controller;
use App\Interfaces\Api\CitiesRepositoryInterface;
use Illuminate\Http\Request;
class CitiesApiController extends Controller {
    protected $Cities;
    public function __construct(CitiesRepositoryInterface $Cities) {
        $this->Cities = $Cities;
    }
    public function getAllCities() {
        return $this->Cities->getAllCities();
    }
    public function getCityById($id) {
        return $this->Cities->getCityById($id);
    }
}
