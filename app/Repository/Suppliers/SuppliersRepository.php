<?php
namespace App\Repository\Suppliers;
use App\Interfaces\Suppliers\SuppliersInterface;
use Illuminate\Support\Facades\Hash;
use App\Models\Group;
use App\Models\Category;
use App\Models\Country;
use App\Models\Provience;
use App\Models\City;
use App\Models\Area;
use App\Models\Currency;
use App\Models\Supplier;
use App\Http\Traits\Dashboard\Upload;
use Illuminate\Support\Facades\DB;
class SuppliersRepository implements SuppliersInterface {
    use Upload;
    public function index() {
        $suppliers = Supplier::all();
        //$suppliers = Supplier::find(79);
        //dd($suppliers->image);
        return view('Dashboard.Suppliers.index', compact('suppliers'));
    }

    public function create() {
        $groups = Group::all();
        $categories = Category::where('parent_id', null)->get();
        $subCategories = Category::where('parent_id', 1)->get();
        $countries = Country::all();
        $proviences = Provience::all();
        $cities = City::all();
        $areas = Area::all();
        $currencies = Currency::all();
        return view('Dashboard.Suppliers.add', compact([
            'groups', 'categories', 'subCategories', 'countries',
            'proviences', 'cities', 'areas', 'currencies'
        ]));
    }

    public function store($request) {
        /*
        $supplier->save();
        */
        DB::beginTransaction();
        try {
            $supplier = new Supplier();
            $supplier->phone = $request->phone;
            $supplier->email = $request->email;
            $supplier->discount = $request->discount;
            $supplier->password = Hash::make($request->password);
            $supplier->status = 1;
            $supplier->created_by    =  auth()->user()->name;
            $supplier->group_id = $request->group_id;
            $supplier->country_id = $request->country_id;
            $supplier->provience_id = $request->provience_id;
            $supplier->city_id = $request->city_id;
            $supplier->area_id = $request->area_id;
            $supplier->category_id = $request->category_id;
            $supplier->subCategory_id = $request->subCategory_id;
            $supplier->currency_id = $request->currency_id;
            $supplier->save();
            $supplier->first_name = $request->first_name;
            $supplier->last_name = $request->last_name;
            $supplier->company_name = $request->company_name;
            $supplier->address_primary = $request->address_primary;
            $supplier->address_secondry = $request->address_secondry;
            $supplier->description = $request->description;
            $supplier->save();
            // Avatar Upload
            $this->verifyAndStoreImage($request, 'photo', 'suppliers', 'upload_image', $supplier->id, 'App\Models\Supplier');
            DB::commit();
            session()->flash('add');
            return redirect()->route('Suppliers.index');
        } catch (\Exception $ex) {
            DB::rollback();
            session()->flash('wrong');
            return redirect()->route('Suppliers.index')->withErrors(['error'=> $ex->getMessage()]);
        }
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