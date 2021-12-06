<?php
namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Interfaces\Countries\CountryRepositoryInterface;
use Illuminate\Http\Request;
class CountryController extends Controller
{
    private $Countries;
    public function __construct(CountryRepositoryInterface $Countries) {
        $this->Countries = $Countries;
    }
    public function index() {
        return $this->Countries->index();
    }

    public function store(Request $request) {
        return $this->Countries->store($request);
    }
    public function update(Request $request) {
        return $this->Countries->update($request);
    }

    public function destroy(Request $request) {
        return $this->Countries->destroy($request);
    }
}
