<?php
namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Interfaces\Suppliers\SuppliersInterface;
use App\Http\Requests\Dashboard\SuppliersRequest;
use App\Http\Requests\Dashboard\SuppliersUpdateRequest;
use Illuminate\Http\Request;
class SupplierController extends Controller
{
    protected $Suppliers;
    public function __construct(SuppliersInterface $Suppliers) {
        $this->Suppliers = $Suppliers;
    }

    public function index() {
        return $this->Suppliers->index();
    }

    public function create() {
        return $this->Suppliers->create();
    }

    public function store(SuppliersRequest $request) {
        return $this->Suppliers->store($request);
    }

    public function update(SuppliersUpdateRequest $request) {
        return $this->Suppliers->update($request);
    }

    public function destroy(Request $request) {
        return $this->Suppliers->destroy($request);
    }
}
