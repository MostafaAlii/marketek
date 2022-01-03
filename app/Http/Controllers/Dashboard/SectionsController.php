<?php
namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Interfaces\Sections\SectionsRepositoryInterface;
use App\Http\Requests\Dashboard\ServiceRequest;
use Illuminate\Http\Request;
class SectionsController extends Controller
{
    protected $CategoryService;
    public function __construct(SectionsRepositoryInterface $CategoryService) {
        $this->CategoryService = $CategoryService;
    }
    public function index() {
        return $this->CategoryService->index();
    }
    public function store(ServiceRequest $request) {
        return $this->CategoryService->store($request);
    }
    public function update(Request $request) {
        return $this->CategoryService->update($request);
    }
    public function destroy(Request $request) {
        return $this->CategoryService->destroy($request);
    }
}
