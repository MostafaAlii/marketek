<?php
namespace App\Interfaces\Sections;
interface SectionsRepositoryInterface {
    public function index();
    public function store($request);
    public function update($request);
    public function destroy($request);
}
