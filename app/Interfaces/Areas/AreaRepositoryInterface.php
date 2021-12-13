<?php
namespace App\Interfaces\Areas;
interface AreaRepositoryInterface {
    public function index();
    public function store($request);
    public function update($request);
    public function destroy($request);
}