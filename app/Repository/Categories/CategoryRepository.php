<?php
namespace App\Repository\Categories;
use App\Interfaces\Categories\CategoryRepositoryInterface;
use App\Models\Category;
use App\Models\Group;

class CategoryRepository implements CategoryRepositoryInterface {
    public function index() {
        $groups = Group::all();
        $categories = Category::parent()->orderBy('id','ASC')->get();
        return view('Dashboard.Categories.index', compact('categories', 'groups'));
    }

    public function store($request) {
        try {
            $category = Category::create($request->except('_token'));
            //$category->grade_id = $request->grade_id;
            $category->created_by    =  auth()->user()->name;
            //save translations
            $category->name = $request->name;
            $category->status = 1;
            $category->save();
            session()->flash('add');
            return redirect()->route('Categories.index');
        } catch (\Exception $ex) {
            session()->flash('wrong');
            return redirect()->route('Categories.index');
        }
    }

    public function update($request) {
        $category = Category::findOrFail($request->id);
        $category->update($request->all());
        $category->updated_by    =  auth()->user()->name;
        $category->name = $request->name;
        $category->save();
        session()->flash('edit');
        return redirect()->route('Categories.index');
    }

    public function destroy($request) {
        Category::findOrFail($request->id)->delete();
        session()->flash('delete');
        return redirect()->route('Categories.index');
    }
}
