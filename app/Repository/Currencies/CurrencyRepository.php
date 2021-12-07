<?php
namespace App\Repository\Currencies;
use App\Interfaces\Currencies\CurrencRepositoryInterface;
use App\Models\Currency;
class CurrencyRepository implements CurrencRepositoryInterface {
    public function index() {
        $currencies = Currency::all();
        return view('Dashboard.Currency.index', compact('currencies'));
    }

    public function store($request) {
        try {
            Currency::create([
                'name'  => $request->input('name'),
                'currency_symbol'  => $request->input('currency_symbol'),
                'created_by'    =>  auth()->user()->name,
            ]);
            session()->flash('add');
            return redirect()->route('Currencies.index');
        } catch (\Exception $ex) {
            session()->flash('wrong');
            return redirect()->route('Currencies.index');
        }
    }

    public function update($request) {
        $currency = Currency::findOrFail($request->id);
        $currency->update([
            'name'  => $request->input('name'),
            'currency_symbol'  => $request->input('currency_symbol'),
            'updated_by'    =>  auth()->user()->name,
        ]);
        session()->flash('edit');
        return redirect()->route('Currencies.index');
    }

    public function destroy($request) {
        Currency::findOrFail($request->id)->delete();
        session()->flash('delete');
        return redirect()->route('Currencies.index');
    }
}