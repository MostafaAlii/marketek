<?php
namespace App\Http\Controllers\Api\City;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use App\Http\Traits\GeneralApiTrait;
class CitiesApiController extends Controller {
    use GeneralApiTrait;
    public function getCities() {
        $cities = City::get();
        return response()->json($cities);
    }
    public function getCityById($id) {
        $city = City::find($id);
        if (!$city)
            return $this->returnError('001', 'عفوا هذه المدينة غير مدعومة');
        return response()->json(['city'=>$city], 200);
    }
}