<?php
namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Interfaces\Currencies\CurrencRepositoryInterface;
use Illuminate\Http\Request;
class CurrencyController extends Controller
{
    private $Currencies;
    public function __construct(CurrencRepositoryInterface $Currencies) {
        $this->Currencies = $Currencies;
    }
    public function index() {
        return $this->Currencies->index();
    }

    public function store(Request $request) {
        return $this->Currencies->store($request);
    }


    public function update(Request $request) {
        return $this->Currencies->update($request);
    }

    public function destroy(Request $request) {
        return $this->Currencies->destroy($request);
    }
}
