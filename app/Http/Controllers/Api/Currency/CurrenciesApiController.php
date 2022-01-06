<?php
namespace App\Http\Controllers\Api\Currency;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Currency;
use App\Http\Traits\GeneralApiTrait;
class CurrenciesApiController extends Controller {
    use GeneralApiTrait;
    public function getCurrencies() {
        $currencies = Currency::get();
        return response()->json($currencies);
    }
    public function getCurrencyById($id) {
        $currency = Currency::find($id);
        if (!$currency)
            return $this->returnError('001', 'عفوا هذه العمله غير مدعومة');
        return response()->json(['currency'=>$currency], 200);
    }
}
