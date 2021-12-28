<?php
namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Interfaces\Products\ProductRepositoryInterface;
use Illuminate\Http\Request;
class ProductController extends Controller
{
    protected $Products;
    public function __construct(ProductRepositoryInterface $Products) {
        $this->Products = $Products;
    }
    public function index() {
        return $this->Products->index();
    }

    public function create() {
        //
    }

    public function store(Request $request) {
        //
    }

    public function show($id) {
        //
    }

    public function edit($id) {
        //
    }

    public function update(Request $request, $id) {
        //
    }

    public function destroy($id) {
        //
    }
}
