<?php
namespace App\Interfaces\Api;
interface GroupsApiRepositoryInterface {
    public function index();
    public function getGroupById ($id);
}