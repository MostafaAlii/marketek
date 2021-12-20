<?php
namespace App\Repository\Api;
use App\Models\Category;
use App\Http\Traits\GeneralApiTrait;
use App\Interfaces\Api\CategoryApiRepositoryInterface;
class CategoriesApiRepository implements CategoryApiRepositoryInterface {
    use GeneralApiTrait;
    public function getMainCategory(){
        $categories = Category::parent()->get();
        return response()->json($categories);
    }

    public function getSubCategory(){
        $subCategories = Category::child()->get();
        return response()->json($subCategories);
    }

    public function getCategoryById($id){
        $mainCategory = Category::findOrFail($id);
        return response()->json($mainCategory);
    }
}