<?php
namespace App\Repository\Cities;
use App\Models\City;
use App\Models\Provience;
use App\Interfaces\Cities\CityRepositoryInterface;
class CityRepository implements CityRepositoryInterface {
    public function index() {
        $cities = City::all();
        $proviences = Provience::all();
        return view('Dashboard.Cities.index', compact('cities','proviences'));
    }

    public function store($request) {
        /*City::create([
            'name'  => $request->input('name'),
            'provience_id'    =>  $request->provience_id,
            'created_by'    =>  auth()->user()->name,
        ]);*/
        $city = City::create($request->except('_token'));
        $city->created_by    =  auth()->user()->name;
        $city->provience_id    =  $request->provience_id;
        $city->name = $request->name;
        //save translations
        $city->save();
        session()->flash('add');
        return redirect()->route('Cities.index');
    }

    public function update($request) {
        /*$city = City::findOrFail($request->id);
        $city->update([
            'name'  => $request->input('name'),
            'updated_by'    =>  auth()->user()->name,
        ]);*/
        $city = City::findOrFail($request->id);
        $city->update($request->all());
        $city->updated_by    =  auth()->user()->name;
        $city->name = $request->name;
        $city->save();
        session()->flash('edit');
        return redirect()->route('Cities.index');
    }

    public function destroy($request) {
        City::findOrFail($request->id)->delete();
        session()->flash('delete');
        return redirect()->route('Cities.index');
    }
}