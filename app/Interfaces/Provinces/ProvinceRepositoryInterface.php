<?php
namespace App\Interfaces\Provinces;
interface ProvinceRepositoryInterface {
    public function index();
    public function store($request);
}