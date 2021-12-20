<?php
namespace App\Interfaces\Api;
interface AreaApiRepositoryInterface {
    public function getAllArea();
    public function getAreaById($id);
}