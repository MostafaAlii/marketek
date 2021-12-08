<?php
namespace App\Repository\Provinces;
use App\Models\Country;
use App\Models\Provience;
use App\Interfaces\Provinces\ProvinceRepositoryInterface;
class ProvinceRepository implements ProvinceRepositoryInterface {
    public function index() {
        //$countries = Country::all();
        $countries = Country::withTranslation()->get();
        $provinces = Provience::all();
        return view('Dashboard.Provinces.index', compact('provinces', 'countries'));
    }
    public function store($request){
        Provience::create([
            'name'  => $request->input('name'),
            'country_id'    =>  $request->input('country_id'),
            'created_by'    =>  auth()->user()->name,
        ]);
        session()->flash('add');
        return redirect()->route('Provinces.index');
    }
}