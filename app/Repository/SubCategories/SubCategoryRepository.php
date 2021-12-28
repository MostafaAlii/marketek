<?php
namespace App\Repository\SubCategories;
use App\Interfaces\SubCategories\SubCategoryRepositoryInterface;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
class SubCategoryRepository implements SubCategoryRepositoryInterface {
    public function index() {
        $categories = Category::parent()->get();
        $subCategories = Category::child()->orderBy('id','ASC')->get();
        return view('Dashboard.SubCategories.index', compact('subCategories', 'categories'));
    }

    public function store($request) {
        try {
            $category = Category::create($request->except('_token'));
            $category->created_by    =  auth()->user()->name;
            //save translations
            $category->name = $request->name;
            $category->save();
            session()->flash('add');
            return redirect()->route('SubCategories.index');
        } catch (\Exception $ex) {
            session()->flash('wrong');
            return redirect()->route('SubCategories.index');
        }
    }

    public function update($request) {
        $category = Category::findOrFail($request->id);
        $category->update($request->all());
        $category->updated_by    =  auth()->user()->name;
        $category->parent_id    =   $request->parent_id;
        $category->name = $request->name;
        $category->save();
        session()->flash('edit');
        return redirect()->route('SubCategories.index');
    }

    public function destroy($request) {
        Category::findOrFail($request->id)->delete();
        session()->flash('delete');
        return redirect()->route('SubCategories.index');
    }
}
