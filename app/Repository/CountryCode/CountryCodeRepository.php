<?php
namespace App\Repository\CountryCode;
use App\Interfaces\CountryCode\CountryCodeInterface;
use App\Models\CountryCode;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
class CountryCodeRepository implements CountryCodeInterface{
    public function index() {
        $countryCodes = CountryCode::select('*')->orderBy('id','ASC')->get();
        return view('Dashboard.CountryCode.index', compact('countryCodes'));
    }

    public function store($request) {
        $dataRequest = $request->except(['image']);
        if($request->image) {
            Image::make($request->image)->resize(150, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/countryFlags/' . $request->image->hashName()));
            $dataRequest['image'] = $request->image->hashName();
            $dataRequest['created_by'] = auth()->user()->name;
        }
        CountryCode::create($dataRequest);   
        session()->flash('add');
        return redirect()->route('CountryCode.index');
    }

    public function update($request) {
        $countryCode = CountryCode::findOrFail($request->id);
        $dataRequest = $request->except(['image']);
        if($request->image) {
            if($countryCode->image != 'default_flag.jpg') {
                Storage::disk('public_uploads')->delete('/countryFlags/' . $countryCode->image);
            }
            Image::make($request->image)->resize(150, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/countryFlags/' . $request->image->hashName()));
            $dataRequest['image'] = $request->image->hashName();
            $dataRequest['updated_by'] = auth()->user()->name;
        }
        $countryCode->update($dataRequest);
        session()->flash('edit');
        return redirect()->route('CountryCode.index');

    }

    public function destroy($request, $countryCode) {
        $countryCode = CountryCode::findOrFail($request->id);
        if($countryCode->image != 'default_flag.jpg') {
            Storage::disk('public_uploads')->delete('/countryFlags/' . $countryCode->image);
        }
        $countryCode->delete();
        session()->flash('delete');
        return redirect()->route('CountryCode.index');
    }
}