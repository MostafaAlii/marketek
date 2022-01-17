<?php
namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Interfaces\Suppliers\SuppliersInterface;
use App\Http\Requests\Dashboard\SuppliersRequest;
use App\Http\Requests\Dashboard\SuppliersUpdateRequest;
use App\Models\User;
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

    public function show($id) {
        return $this->Suppliers->show($id);
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

    public function destroy(Request $request, User $supplier) {
        return $this->Suppliers->destroy($request, $supplier);
    }
}
