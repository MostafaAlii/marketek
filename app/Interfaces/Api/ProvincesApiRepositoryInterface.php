<?php
namespace App\Interfaces\Api;
interface ProvincesApiRepositoryInterface {
    public function getAllProvinces();
    public function getProvinceByID($id);
}