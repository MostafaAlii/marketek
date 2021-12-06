<?php
namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Interfaces\Suppliers\SuppliersInterface;
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

    public function store(Request $request) {
        return $this->Suppliers->store($request);
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
