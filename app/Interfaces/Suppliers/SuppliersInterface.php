<?php
namespace App\Interfaces\Suppliers;
interface SuppliersInterface {
    public function index();
    public function create();
    public function store($request);
    public function update($request);
    public function destroy($request, $supplier);
}