<?php
namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Interfaces\Groups\GroupRepositoryInterface;
use Illuminate\Http\Request;
class GroupController extends Controller
{
    private $Groups;
    public function __construct(GroupRepositoryInterface $Groups) {
        $this->Groups = $Groups;
    }
    public function index() {
        return $this->Groups->index();
    }

    public function store(Request $request) {
        return $this->Groups->store($request);
    }


    public function update(Request $request) {
        return $this->Groups->update($request);
    }

    public function destroy(Request $request) {
        return $this->Groups->destroy($request);
    }
}
