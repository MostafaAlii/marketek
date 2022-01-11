<?php
namespace App\Http\Controllers\Api\CountryCode;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CountryCode;
use App\Http\Resources\General\CountryCodeResourse;
use App\Http\Traits\GeneralApiTrait;
class CountryCodeApiController extends Controller {
    use GeneralApiTrait;
    public function getCountryCode() {
        $countryCode = CountryCode::get();
        if ($countryCode->count() > 0) {
            return CountryCodeResourse::collection($countryCode);
        } else {
            return response()->json(['error' => true, 'message'=> 'No Country Code Or Flag found'], 201);
        }
    }
}
