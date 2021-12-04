<?php
namespace App\Repository\Categories;
use App\Interfaces\Categories\CategoryRepositoryInterface;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
class CategoryRepository implements CategoryRepositoryInterface {
    public function index() {
        $categories = Category::all();
        return view('Dashboard.Categories.index', compact('categories'));
    }

    public function store($request) {
        try {
            if (!$request->has('status'))
                $request->request->add(['status' => 0]);
            else
                $request->request->add(['status' => 1]);
            $category = Category::create($request->except('_token'));
            $category->created_by    =  auth()->user()->name;
            //save translations
            $category->name = $request->name;
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