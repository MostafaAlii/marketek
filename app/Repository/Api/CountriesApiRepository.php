<?php
namespace App\Repository\Api;
use App\Models\Country;
use App\Models\Provience;
use App\Http\Traits\GeneralApiTrait;
use App\Interfaces\Api\CountriesApiRepositoryInterface;
class CountriesApiRepository implements CountriesApiRepositoryInterface {
    use GeneralApiTrait;
    public function getAllCountries(){
        $Country = Country::get();
        return response()->json($Country);
    }
    public function getCountryById($id) {
        $Country = Country::findOrFail($id);
        return response()->json($Country);
    }
    /*public function getCountryWithProvience(){
        $Country = Country::get();
        $Provience = Provience::get();
        $CountryProvience = 
    }*/
}