<?php
namespace App\Interfaces\Services;
interface ServicesRepositoryInterface {
    public function index();
    public function store($request);
}
