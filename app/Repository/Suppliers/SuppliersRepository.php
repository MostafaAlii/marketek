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
use App\Models\User;
use App\Http\Traits\Dashboard\Upload;
use Illuminate\Support\Facades\DB;
class SuppliersRepository implements SuppliersInterface {
    use Upload;
    public function index() {
        $suppliers = User::all();
        $groups = Group::all();
        $categories = Category::where('parent_id', null)->get();
        $subCategories = Category::where('parent_id', 1)->get();
        $countries = Country::all();
        $proviences = Provience::all();
        $cities = City::all();
        $areas = Area::all();
        $currencies = Currency::all();
        return view('Dashboard.Suppliers.index', compact([
            'suppliers','groups', 'categories', 'subCategories', 'countries',
            'proviences', 'cities', 'areas', 'currencies'
        ]));
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
        DB::beginTransaction();
        try {
            $supplier = new User();
            $supplier->phone = $request->phone;
            $supplier->email = $request->email;
            $supplier->discount = $request->discount;
            $supplier->password = Hash::make($request->password);
            $supplier->status = $request->status;
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
            $this->verifyAndStoreImage($request, 'photo', 'suppliers', 'upload_image', $supplier->id, 'App\Models\Users');
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

            session()->flash('wrong');
            return redirect()->route('Suppliers.index')->withErrors(['error'=> $ex->getMessage()]);
        }

    public function destroy($request){
        if($request->page_id == 1) {
            if($request->filename){
                $this->delete_attachment('upload_image', 'suppliers/'. $request->filename, $request->id, $request->filename);
            }
            User::destroy($request->id);
            session()->flash('delete');
            return redirect()->route('Suppliers.index');
        }

        else{

        }
    }
}
