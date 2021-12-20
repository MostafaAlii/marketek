<?php
namespace App\Http\Controllers\Dashboard\Api;
use App\Http\Controllers\Controller;
use App\Interfaces\Api\GroupsApiRepositoryInterface;
use Illuminate\Http\Request;
class GroupApiController extends Controller
{
    private $Groups;
    public function __construct(GroupsApiRepositoryInterface $Groups) {
        $this->Groups = $Groups;
    }
    public function index() {
        return $this->Groups->index();
    }
    public function getGroupById($id) {
        return $this->Groups->getGroupById($id);
    }

    public function edit($id)
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
