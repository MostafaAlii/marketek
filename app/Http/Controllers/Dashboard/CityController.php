<?php
namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\CityRequest;
use App\Interfaces\Cities\CityRepositoryInterface;
use Illuminate\Http\Request;
class CityController extends Controller
{
    protected $City;
    public function __construct(CityRepositoryInterface $City) {
        $this->City = $City;
    }
    public function index() {
        return $this->City->index();
    }

    public function store(CityRequest $request) {
        return $this->City->store($request);
    }

    public function update(CityRequest $request) {
        return $this->City->update($request);
    }

    public function destroy(Request $request) {
        return $this->City->destroy($request);
    }
}
