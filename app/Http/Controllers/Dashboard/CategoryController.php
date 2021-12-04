<?php
namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Interfaces\Categories\CategoryRepositoryInterface;
use App\Http\Requests\Dashboard\MainCategoryRequest;
use Illuminate\Http\Request;
class CategoryController extends Controller
{
    private $Categories;
    public function __construct(CategoryRepositoryInterface $Categories) {
        $this->Categories = $Categories;
    }
    public function index() {
        return $this->Categories->index();
    }

    public function store(MainCategoryRequest $request) {
        return $this->Categories->store($request);
    }

    public function update(MainCategoryRequest $request) {
        return $this->Categories->update($request);
    }

    public function destroy(Request $request) {
        return $this->Categories->destroy($request);
    }
}
