<?php
namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\Section;
use Illuminate\Http\Request;
class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $sections = Section::all();
        return view('Dashboard.Sections.index', compact('sections'));
    }

    
    public function store(Request $request)
    {
        Section::create([
            'name'  =>  $request->input('name'),
        ]);
        return redirect()->route('Sections.index');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $section = Section::orderBy('id', 'DESC')->find($id);
        if (!$section)
            return redirect()->route('Sections.index')->with(['error' => 'هذا القسم غير موجود ']);
        return view('Dashboard.Sections.btn.edit', compact('section'));
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
        /*$section = Section::findOrFail($request->id);
        $section->update([
            'name'  =>  $request->input('name'),
        ]);
        return redirect()->route('Sections.index');*/
        try {
            $section = Section::find($id);
            if (!$section)
                return redirect()->route('Sections.index')->with(['error' => 'هذا القسم غير موجود']);
            $section->update($request->all());
            //save translations
            $section->name = $request->name;
            $section->save();
            return redirect()->route('Sections.index')->with(['success' => 'تم ألتحديث بنجاح']);
        } catch (\Exception $ex) {
            return redirect()->route('Sections.index')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
    public function delete($id) {
        try {
            //get specific Section and its translations
            $section = Section::orderBy('id', 'DESC')->find($id);

            if (!$section)
                return redirect()->route('Sections.index')->with(['error' => 'هذا القسم غير موجود ']);

            $section->delete();

            return redirect()->route('Sections.index')->with(['success' => 'تم  الحذف بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('Sections.index')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
}
