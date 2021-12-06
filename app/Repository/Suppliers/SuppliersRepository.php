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
        $supplier->email = $request->email;
        $supplier->password = Hash::make($request->password);
        $supplier->save();
        session()->flash('add');
        return redirect()->route('Suppliers.index');
    }
}