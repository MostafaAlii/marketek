<?php
namespace App\Http\Controllers\Dashboard\Api;
use App\Http\Controllers\Controller;
use App\Interfaces\Api\AreaApiRepositoryInterface;
use Illuminate\Http\Request;
class AreaApiController extends Controller {
    protected $Area;
    public function __construct(AreaApiRepositoryInterface $Area) {
        $this->Area = $Area;
    }
    public function getAllArea() {
        return $this->Area->getAllArea();
    }
    public function getAreaById($id) {
        return $this->Area->getAreaById($id);
    }
}
