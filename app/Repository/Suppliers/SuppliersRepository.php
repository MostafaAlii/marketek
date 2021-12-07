<?php
namespace App\Repository\Suppliers;
use App\Interfaces\Suppliers\SuppliersInterface;
use Illuminate\Support\Facades\Hash;
use App\Models\Supplier;
class SuppliersRepository implements SuppliersInterface {
    public function index() {
        $suppliers = Supplier::all();
        return view('Dashboard.Suppliers.index', compact('suppliers'));
    }

    public function store($request)
    {
        $supplier = new Supplier();
        $supplier->first_name = $request->first_name;
        $supplier->last_name = $request->last_name;
        $supplier->email = $request->email;
        $supplier->password = Hash::make($request->password);
        $supplier->phone = $request->phone;
        $supplier->save();
        session()->flash('add');
        return redirect()->route('Suppliers.index');
    }
}