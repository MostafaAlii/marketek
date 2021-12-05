<?php
namespace App\Interfaces\Categories;
interface CategoryRepositoryInterface {
    public function index();
    public function store($request);
    public function update($request);
    public function destroy($request);
}