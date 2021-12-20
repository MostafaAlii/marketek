<?php
namespace App\Http\Controllers\Dashboard\Api;
use App\Http\Controllers\Controller;
use App\Interfaces\Api\CountriesApiRepositoryInterface;
use Illuminate\Http\Request;
class CountriesApiController extends Controller implements CountriesApiRepositoryInterface {
    protected $Countries;
    public function __construct(CountriesApiRepositoryInterface $Countries) {
        $this->Countries = $Countries;
    }

    public function getAllCountries() {
        return $this->Countries->getAllCountries();
    }

    public function getCountryById($id) {
        return $this->Countries->getCountryById($id);
    }
}
