<?php
namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Interfaces\Suppliers\SuppliersInterface;
use App\Http\Requests\Dashboard\SuppliersRequest;
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

    public function store(SuppliersRequest $request) {
        return $this->Suppliers->store($request);
    }

    public function update(SuppliersRequest $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
