<?php
namespace App\Http\Controllers\Dashboard\Api;
use App\Http\Controllers\Controller;
use App\Interfaces\Api\CategoryApiRepositoryInterface;
use Illuminate\Http\Request;
class CategoryApiController extends Controller
{
    public $Categories;
    public function __construct(CategoryApiRepositoryInterface $Categories) {
        $this->Categories = $Categories;
    }
    public function getMainCategory() {
        return $this->Categories->getMainCategory();
    }
    public function getSubCategory() {
        return $this->Categories->getSubCategory();
    }
    public function getCategoryById($id){
        return $this->Categories->getCategoryById($id);
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
