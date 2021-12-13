<?php
namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Interfaces\Provinces\ProvinceRepositoryInterface;
use Illuminate\Http\Request;
class ProvincesController extends Controller
{
    private $Provinces;
    public function __construct(ProvinceRepositoryInterface $Provinces) {
        $this->Provinces = $Provinces;
    }
    public function index() {
        return $this->Provinces->index();
    }

    public function store(Request $request) {
        return $this->Provinces->store($request);
    }

    public function update(Request $request) {
        return $this->Provinces->update($request);
    }

    public function destroy(Request $request) {
        return $this->Provinces->destroy($request);
    }
}
