<?php
namespace App\Interfaces\Api;
interface CategoryApiRepositoryInterface {
    public function getMainCategory();
    public function getSubCategory();
    public function getCategoryById($id);
}