<?php
namespace App\Repository\Areas;
use App\Interfaces\Areas\AreaRepositoryInterface;
use App\Models\Area;
use App\Models\City;

class AreaRepository implements AreaRepositoryInterface {
    public function index(){
        $areas      =   Area::all();
        $cities = City::all();
        return view('Dashboard.Areas.index', compact('cities','areas'));
    }

    public function store($request) {
        Area::create([
            'name'  => $request->input('name'),
            'city_id'    =>  $request->city_id,
            'created_by'    =>  auth()->user()->name,
        ]);
        session()->flash('add');
        return redirect()->route('Areas.index');
    }

    public function update($request) {
        $area = Area::findOrFail($request->id);
        $area->update([
            'name'  => $request->input('name'),
            'city_id'    =>  $request->city_id,
            'updated_by'    =>  auth()->user()->name,
        ]);
        session()->flash('edit');
        return redirect()->route('Areas.index');
    }

    public function destroy($request) {
        Area::findOrFail($request->id)->delete();
        session()->flash('delete');
        return redirect()->route('Areas.index');
    }
}
