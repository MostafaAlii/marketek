<?php
namespace App\Repository\Api;
use App\Interfaces\Api\GroupsApiRepositoryInterface;
use App\Http\Traits\GeneralApiTrait;
use App\Models\Group;
class GroupsApiRepository implements GroupsApiRepositoryInterface{
    use GeneralApiTrait;
    public function index(){
        $groups = Group::get();
        return response()->json($groups);
    }

    public function getGroupById($id) {
        $group = Group::findOrFail($id);
        return response()->json($group);
    }
}