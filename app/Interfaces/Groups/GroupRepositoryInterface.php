<?php
namespace App\Interfaces\Groups;
interface GroupRepositoryInterface {
    public function index();
    public function store($request);
    public function update($request);
    public function destroy($request);
}