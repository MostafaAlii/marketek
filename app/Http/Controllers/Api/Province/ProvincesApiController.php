<?php
namespace App\Http\Controllers\Api\Province;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Provience;
use App\Http\Traits\GeneralApiTrait;
class ProvincesApiController extends Controller {
    use GeneralApiTrait;
    public function getProviences() {
        $proviences = Provience::get();
        return response()->json($proviences);
    }
    public function getProvienceById($id) {
        $provience = Provience::find($id);
        if (!$provience)
            return $this->returnError('001', 'عفوا هذه المحافظة غير مدعومة');
        return response()->json(['provience'=>$provience], 200);
    }
}
