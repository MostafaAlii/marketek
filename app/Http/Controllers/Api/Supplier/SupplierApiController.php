<?php

namespace App\Http\Controllers\Api\Supplier;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Resources\Supplier\SupplierProfileResource;
use Illuminate\Http\Request;
class SupplierApiController extends Controller {
    public function getSupplierById($id) {
        $supplier = User::find($id);
        return response()->json(['supplier'=>$supplier], 200);
        //return SupplierProfileResource::collection($supplier);
    }
}
