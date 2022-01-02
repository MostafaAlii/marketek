<?php
namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Interfaces\Services\ServicesRepositoryInterface;
use App\Http\Requests\Dashboard\ServiceRequest;
use Illuminate\Http\Request;
class ServicesController extends Controller
{
    protected $CategoryService;
    public function __construct(ServicesRepositoryInterface $CategoryService) {
        $this->CategoryService = $CategoryService;
    }
    public function index() {
        return $this->CategoryService->index();
    }
    public function store(ServiceRequest $request) {
        return $this->CategoryService->store($request);
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
