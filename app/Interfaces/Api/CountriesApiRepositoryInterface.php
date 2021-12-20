<?php
namespace App\Interfaces\Api;
interface CountriesApiRepositoryInterface {
    public function getAllCountries();
    public function getCountryById($id);
}