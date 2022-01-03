<?php
namespace App\Repository\Sections;
use App\Interfaces\Sections\SectionsRepositoryInterface;
use App\Models\Section;
class SectionsRepository implements SectionsRepositoryInterface {
    public function index() {
        $ServiceCategories = Section::all();
        return view('Dashboard.Sections.index', compact('ServiceCategories'));
    }
    public function store($request) {
        Section::firstOrCreate(
            ['name' =>  request('name')],
            ['created_by'    =>  auth()->user()->name],
        );
        session()->flash('add');
        return redirect()->route('Sections.index');
    }

    public function update($request) {
        $section = Section::findOrFail($request->id);
        $section->update([
            'name'  => $request->input('name'),
            'updated_by'    =>  auth()->user()->name,
        ]);
        session()->flash('edit');
        return redirect()->route('Sections.index');
    }

    public function destroy($request) {
        Section::findOrFail($request->id)->delete();
        session()->flash('delete');
        return redirect()->route('Sections.index');
    }
}
