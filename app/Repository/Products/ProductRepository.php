<?php
namespace App\Repository\Products;
use App\Models\Products;
use App\Interfaces\Products\ProductRepositoryInterface;
class ProductRepository implements ProductRepositoryInterface {
    public function  index() {
        //$products = Products::all();
        return view('Dashboard.Products.index'/*, compact('products')*/);
    }
}
