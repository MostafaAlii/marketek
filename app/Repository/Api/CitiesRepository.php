<?php
namespace App\Repository\Api;
use App\Models\City;
use App\Interfaces\Api\CitiesRepositoryInterface;
class CitiesRepository implements CitiesRepositoryInterface {
    public function getAllCities() {
        $Cities = City::get();
        return response()->json($Cities);
    }
    public function getCityById($id) {
        $City = City::findOrFail($id);
        return response()->json($City);
    }
}