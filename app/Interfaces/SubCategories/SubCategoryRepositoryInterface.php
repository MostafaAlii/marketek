<?php
namespace App\Interfaces\SubCategories;
interface SubCategoryRepositoryInterface {
    public function index();
    public function store($request);
    public function update($request);
    public function destroy($request);
}