<?php
namespace App\Http\Traits;
trait GeneralApiTrait {

    public function getCurrentLocation() {
        return app()->getLocale();
    }

    public function returnErrorMessage($errorNumber, $message) {
        return response()->json([
            'status'            =>  false,
            'errorNumber'       =>  $errorNumber,
            'message'           =>  $message,
        ]);
    }

    public function returnSuccessMessage($errorNumber = "Success0", $message = "") {
        return response()->json([
            'status'            =>  true,
            'errorNumber'       =>  $errorNumber,
            'message'           =>  $message,
        ]);
    }

    public function returnData($errorNumber = "Success0", $message = "", $key, $value) {
        return response()->json([
            'status'            =>  true,
            'errorNumber'       =>  $errorNumber,
            'message'           =>  $message,
            $key                =>  $value,
        ]);
    }
}