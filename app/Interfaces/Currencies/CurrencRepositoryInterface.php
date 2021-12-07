<?php
namespace App\Interfaces\Currencies;
interface CurrencRepositoryInterface {
    public function index();
    public function store($request);
    public function update($request);
    public function destroy($request);
}