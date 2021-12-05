<?php
namespace App\Repository\Suppliers;
use App\Interfaces\Suppliers\SuppliersRepositoryInterface;
use App\Models\Supplier;
use App\Http\Requests\Dashboard\SuppliersRequest;
class SupplierRepository implements SuppliersRepositoryInterface {
    public function index() {
        $suppliers = Supplier::select()->orderBy()->paginate(PAGINATION_COUNT);
        return view('Dashboard.Suppliers.index', compact('suppliers'));
    }
}