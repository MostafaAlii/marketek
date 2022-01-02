<?php
namespace App\Repository\Services;
use App\Interfaces\Services\ServicesRepositoryInterface;
use App\Models\Service;
class ServicesRepository implements ServicesRepositoryInterface {
    public function index() {
        $ServiceCategories = Service::all();
        return view('Dashboard.Services.index', compact('ServiceCategories'));
    }
    public function store($request) {
        Service::firstOrCreate(
            ['name' =>  request('name')],
            ['created_by'    =>  auth()->user()->name],
        );
        session()->flash('add');
        return redirect()->route('Services.index');
    }
}
