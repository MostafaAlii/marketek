<?php
namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CountryCode;
use App\Http\Traits\Dashboard\Upload;
class CountryCodeController extends Controller
{
    use Upload;
    public function index() {
        $countryCode = CountryCode::latest()->paginate(5);
    
        return view('Dashboard.CountryCode.index',compact('countryCode'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function store(Request $request) {
        $countryCode = new CountryCode;
        $request->validate([
            'code' => 'required|numeric',
            'photo' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);
        $countryCode->code = $request->input('code');
        if (request()->hasFile('photo') && request('photo') != '') {
            $image=$request->file('photo');
            $imageName=time(). '.' .$image->extension();
            $image->move(public_path('storage/CountryCode'),$imageName);
            $countryCode->photo = 'CountryCode/'.$imageName;
        }
        $countryCode->name = $request->file('photo')->getClientOriginalName();
        $countryCode->save();
        session()->flash('add');
        return redirect()->route('CountryCode.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
