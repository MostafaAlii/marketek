<?php
namespace App\Repository\Products;
use App\Models\Products;
use App\Models\Category;
use App\Models\User;
use App\Interfaces\Products\ProductRepositoryInterface;
class ProductRepository implements ProductRepositoryInterface {
    public function  index() {
        $products = Products::all();
        return view('Dashboard.Products.index', compact('products'));
    }

    public function create() {
        $data = [];
        $data['users'] = User::activeStatus()->select('id')->get();
        $data['categories'] = Category::activeStatus()->select('id')->get();
        return view('Dashboard.Products.add', $data);
    }
}
