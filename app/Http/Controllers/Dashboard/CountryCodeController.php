<?php
namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Interfaces\CountryCode\CountryCodeInterface;
use App\Http\Requests\Dashboard\CountryCodeRequest;
use App\Models\CountryCode;
use Illuminate\Http\Request;
class CountryCodeController extends Controller
{
    protected $countryCode;
    public function __construct(CountryCodeInterface $countryCode) {
        $this->countryCode = $countryCode;
    }
    public function index() {
        return $this->countryCode->index();
    }

    public function store(CountryCodeRequest $request) {
        return $this->countryCode->store($request);
    }

    public function update(Request $request) {
        return $this->countryCode->update($request);
    }

    public function destroy(Request $request, CountryCode $countryCode) {
        return $this->countryCode->destroy($request, $countryCode);
    }
}