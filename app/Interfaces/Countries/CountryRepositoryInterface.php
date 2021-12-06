<?php
namespace App\Interfaces\Countries;
interface CountryRepositoryInterface {
    public function index();
    public function store($request);
    public function update($request);
    public function destroy($request);
}