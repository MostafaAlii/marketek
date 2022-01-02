<?php
namespace App\Repository\Products;
use App\Interfaces\Products\ProductRepositoryInterface;
use App\Models\Category;
use App\Models\Products;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ProductRepository implements ProductRepositoryInterface {
    public function  index() {
        $products = Products::all();
        return view('Dashboard.Products.index', compact('products'));
    }

    public function create() {
        //$data = [];
        //$data['users'] = User::activeStatus()->select('id')->get();
        //$data['categories'] = Category::activeStatus()->select('id')->get();
        $Categories = Category::all();
        $Users = User::all();
        return view('Dashboard.Products.add', compact('Categories', 'Users'));
    }

    public function store($request) {
        DB::beginTransaction();
        try {
            if (!$request->has('is_active'))
            {
                $request->request->add(['is_active' => 0]);
            }
            else {
                $request->request->add(['is_active' => 1]);
            }
            $product = Products::create([
                'slug' => $request->slug,
                'user_id' => $request->user_id,
                'is_active' => $request->is_active,
            ]);
            //save translations
            $product->name = $request->name;
            $product->description = $request->description;
            $product->short_description = $request->short_description;
            $product->save();
            $product->categories()->attach($request->categories);
            DB::commit();
            session()->flash('add');
            return redirect()->route('products');
        } catch (\Exception $ex) {
            DB::rollback();
            session()->flash('wrong');
            return redirect()->route('products')->withErrors(['error'=> $ex->getMessage()]);
        }

    }
}
