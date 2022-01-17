<?php
namespace App\Repository\Suppliers;
use App\Interfaces\Suppliers\SuppliersInterface;
use App\Models\Area;
use App\Models\Category;
use App\Models\City;
use App\Models\Country;
use App\Models\Currency;
use App\Models\Group;
use App\Models\Provience;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
class SuppliersRepository implements SuppliersInterface {
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
            $request->except(['image']);
            $supplier = new User();
            // Avatar Upload
            if($request->image) {
                Image::make($request->image)->resize(150, 150, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('uploads/suppliersImage/' . $request->image->hashName()));
                $supplier->image = $request->image->hashName();
            }
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
            DB::commit();
            session()->flash('add');
            return redirect()->route('suppliers.index');
        } catch (\Exception $ex) {
            DB::rollback();
            session()->flash('wrong');
            return redirect()->route('Suppliers.index')->withErrors(['error'=> $ex->getMessage()]);
        }
    }

    public function show($id) {
        $userProfile = User::find($id);
        return view('Dashboard.Suppliers.show', compact('userProfile'));
    }

    public function update($request) {
        $supplier = User::findOrFail($request->id);
        $dataRequest = $request->except(['image']);
        if($request->image) {
            if($supplier->image != 'default_avatar.png') {
                Storage::disk('public_uploads')->delete('/suppliersImage/' . $supplier->image);
            }
            Image::make($request->image)->resize(150, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/suppliersImage/' . $request->image->hashName()));
            $dataRequest['image'] = $request->image->hashName();
            $dataRequest['updated_by'] = auth()->user()->name;
        }
        $supplier->update($dataRequest);
        session()->flash('edit');
        return redirect()->route('Suppliers.index');
    }

    public function destroy($request, $supplier) {
        $supplier = User::findOrFail($request->id);
        if($supplier->image != 'default_avatar.png') {
            Storage::disk('public_uploads')->delete('/suppliersImage/' . $supplier->image);
        }
        $supplier->delete();
        session()->flash('delete');
        return redirect()->route('Suppliers.index');
    }
}