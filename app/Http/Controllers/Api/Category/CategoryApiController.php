<?php
namespace App\Http\Controllers\Api\Category;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController as BaseController;
class CategoryApiController extends BaseController {
    public function getMainCategory() {
        $categories = Category::parent()->orderBy('id','ASC')->get();
        return response()->json($categories);
    }

    public function getSubCategory() {
        $subCategories = Category::child()->orderBy('id','ASC')->get();
        return response()->json($subCategories);
    }

    public function getCategoryById($id) {
        $mainCategory = Category::find($id);
        return response()->json(['mainCategory'=>$mainCategory], 200);
    }
}
