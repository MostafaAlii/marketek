<?php
namespace App\Repository\Provinces;
use App\Models\Country;
use App\Models\Provience;
use App\Interfaces\Provinces\ProvinceRepositoryInterface;
class ProvinceRepository implements ProvinceRepositoryInterface {
    public function index() {
        $countries = Country::all();
        $provinces = Provience::all();
        return view('Dashboard.Provinces.index', compact('provinces', 'countries'));
    }
}