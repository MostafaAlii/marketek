<?php
namespace App\Http\Controllers\Api\Country;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Http\Traits\GeneralApiTrait;
class CountriesApiController extends Controller {
    use GeneralApiTrait;
    public function getCountries() {
        $countries = Country::get();
        return response()->json($countries);
    }

    public function getCountryById($id) {
        $country = Country::find($id);
        if (!$country)
            return $this->returnError('001', 'عفوا هذه البلد غير مدعومة');
        return response()->json(['country'=>$country], 200);
    }
}