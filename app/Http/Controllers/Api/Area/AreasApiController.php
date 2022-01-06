<?php
namespace App\Http\Controllers\Api\Area;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Area;
use App\Http\Traits\GeneralApiTrait;
class AreasApiController extends Controller {
    use GeneralApiTrait;
    public function getAreas() {
        $areas = Area::get();
        return response()->json($areas);
    }
    public function getAreaById($id) {
        $area = Area::find($id);
        if (!$area)
            return $this->returnError('001', 'عفوا هذه المنطقة غير مدعومة');
        return response()->json(['area'=>$area], 200);
    }
}
