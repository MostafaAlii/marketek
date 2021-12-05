<?php
namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Interfaces\Suppliers\SuppliersRepositoryInterface;
use Illuminate\Http\Request;
class SupplierController extends Controller
{
    protected $Suppliers;
    public function __construct(SuppliersRepositoryInterface $Suppliers) {
        $this->Suppliers = $Suppliers;
    }

    public function index() {
        return $this->Suppliers->index()->dd();
    }

    public function store(Request $request)
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
