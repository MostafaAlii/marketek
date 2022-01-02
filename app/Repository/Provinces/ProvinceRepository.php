<?php
namespace App\Repository\Provinces;
use App\Interfaces\Provinces\ProvinceRepositoryInterface;
use App\Models\Country;
use App\Models\Provience;

class ProvinceRepository implements ProvinceRepositoryInterface {
    public function index() {
        $countries = Country::all();
        $provinces = Provience::all();
        return view('Dashboard.Provinces.index', compact('provinces', 'countries'));
    }

    public function store($request) {
        Provience::create([
            'name'  => $request->input('name'),
            'country_id'    =>  $request->country_id,
            'created_by'    =>  auth()->user()->name,
        ]);
        session()->flash('add');
        return redirect()->route('Provinces.index');
    }

    public function update($request) {
        $province = Provience::findOrFail($request->id);
        $province->update([
            'name'  => $request->input('name'),
            'country_id'    =>  $request->country_id,
            'updated_by'    =>  auth()->user()->name,
        ]);
        session()->flash('edit');
        return redirect()->route('Provinces.index');
    }

    public function destroy($request) {
        Provience::findOrFail($request->id)->delete();
        session()->flash('delete');
        return redirect()->route('Provinces.index');
    }
}
