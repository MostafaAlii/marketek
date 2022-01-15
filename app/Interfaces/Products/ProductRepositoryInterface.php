<?php
namespace App\Interfaces\Products;
interface ProductRepositoryInterface {
    public  function index();
    public function create();
    public function store($request);
}