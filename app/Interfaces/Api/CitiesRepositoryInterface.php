<?php
namespace App\Interfaces\Api;
interface CitiesRepositoryInterface {
    public function getAllCities();
    public function getCityById($id);
}