<?php
namespace App\Repository\Api;
use App\Models\Area;
use App\Interfaces\Api\AreaApiRepositoryInterface;
class AreaApiRepository implements AreaApiRepositoryInterface {
    public function getAllArea() {
        $Area = Area::get();
        return response()->json($Area);
    }
    public function getAreaById($id) {
        $Area = Area::findOrFail($id);
        return response()->json($Area);
    }
}