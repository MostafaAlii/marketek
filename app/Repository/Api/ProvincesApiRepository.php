<?php
namespace App\Repository\Api;
use App\Interfaces\Api\ProvincesApiRepositoryInterface;
use App\Models\Provience;
class ProvincesApiRepository implements ProvincesApiRepositoryInterface {
    public function getAllProvinces() {
        $Provience = Provience::get();
        return response()->json($Provience);
    }
    public function getProvinceByID($id) {
        $Provience = Provience::findOrFail($id);
        return response()->json($Provience);
    }
}