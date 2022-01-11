<?php
namespace App\Interfaces\CountryCode;
interface CountryCodeInterface {
    public function index();
    public function store($request);
    public function update($request);
    public function destroy($request, $countryCode);
}