<?php
namespace App\Interfaces\Suppliers;
interface SuppliersInterface {
    public function index();
    public function store($request);
}