<?php
namespace App\Http\Controllers\Dashboard;
use App\Interfaces\Products\ProductRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class ProductController extends Controller {
    protected $Products;
    public function __construct(ProductRepositoryInterface $Products) {
        $this->Products = $Products;
    }

    public function index() {
        return $this->Products->index();
    }

    public function create() {
        return $this->Products->create();
    }
}
