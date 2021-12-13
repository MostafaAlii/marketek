<?php
namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Interfaces\Areas\AreaRepositoryInterface;
use Illuminate\Http\Request;
class AreaController extends Controller {
    protected $Area;
    public function __construct(AreaRepositoryInterface $Area) {
        $this->Area = $Area;
    }
    public function index() {
        return $this->Area->index();
    }

    public function store(Request $request) {
        return $this->Area->store($request);
    }

    public function update(Request $request) {
        return $this->Area->update($request);
    }

    public function destroy(Request $request) {
        return $this->Area->destroy($request);
    }
}
