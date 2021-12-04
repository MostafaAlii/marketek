<?php
namespace App\Repository\Groups;
use App\Interfaces\Groups\GroupRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use App\Models\Group;
class GroupRepository implements GroupRepositoryInterface {
    public function index() {
        $groups = Group::all();
        return view('Dashboard.Groups.index', compact('groups'));
    }

    public function store($request) {
        Group::create([
            'name'  => $request->input('name'),
            'created_by'    =>  auth()->user()->name,
        ]);
        session()->flash('add');
        return redirect()->route('Groups.index');
    }

    public function update($request) {
        $group = Group::findOrFail($request->id);
        $group->update([
            'name'  => $request->input('name'),
            'updated_by'    =>  auth()->user()->name,
        ]);
        session()->flash('edit');
        return redirect()->route('Groups.index');
    }

    public function destroy($request) {
        Group::findOrFail($request->id)->delete();
        session()->flash('delete');
        return redirect()->route('Groups.index');
    }
}