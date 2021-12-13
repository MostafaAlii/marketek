<?php
namespace App\Interfaces\Cities;
interface CityRepositoryInterface {
    public function index();
    public function store($request);
    public function update($request);
    public function destroy($request);
}
