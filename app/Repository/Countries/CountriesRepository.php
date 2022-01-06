<?php
namespace App\Repository\Countries;
use App\Interfaces\Countries\CountryRepositoryInterface;
use App\Models\Country;
class CountriesRepository implements CountryRepositoryInterface {
    public function index() {
        $countries = Country::all();
        return view('Dashboard.Countries.index', compact('countries'));
    }
    public function store($request) {
        Country::create([
            'name'  => $request->input('name'),
            'created_by'    =>  auth()->user()->name,
        ]);
        session()->flash('add');
        return redirect()->route('Countries.index');
    }

    public function update($request) {
        $country = Country::findOrFail($request->id);
        $country->update([
            'name'  => $request->input('name'),
            'updated_by'    =>  auth()->user()->name,
        ]);
        session()->flash('edit');
        return redirect()->route('Countries.index');
    }

    public function destroy($request) {
        Country::findOrFail($request->id)->delete();
        session()->flash('delete');
        return redirect()->route('Countries.index');
    }
}
