<?php
namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Interfaces\SubCategories\SubCategoryRepositoryInterface;
use App\Http\Requests\Dashboard\SubCategoryRequest;
use Illuminate\Http\Request;
class SubCategoryController extends Controller
{
    private $SubCategories;
    public function __construct(SubCategoryRepositoryInterface $SubCategories) {
        $this->SubCategories = $SubCategories;
    }
    public function index() {
        return $this->SubCategories->index();
    }

    public function store(SubCategoryRequest $request) {
        return $this->SubCategories->store($request);
    }

    public function update(SubCategoryRequest $request) {
        return $this->SubCategories->update($request);
    }

    public function destroy(Request $request) {
        return $this->SubCategories->destroy($request);
    }
}
