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

    public function store($request) {
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

    public function update($request) {
        $first_name=$request->first_name;
        $last_name=$request->last_name;
        $password=$request->password;
        $phone=$request->phone;
        $supplier = Supplier::find($request->id);
        $supplier->first_name = $first_name;
        $supplier->last_name = $last_name;
        if(request('password')){
            $supplier->password =  bcrypt($password);
        }else{
           unset($password);
        }
        if(request('phone')){
            $supplier->phone = $phone;
        }else{
           unset($phone);
        }
        $supplier->update();
        session()->flash('edit');
        return redirect()->route('Suppliers.index');
    }

    public function destroy($request){
        Supplier::findOrFail($request->id)->delete();
        session()->flash('delete');
        return redirect()->route('Suppliers.index');
    }
}