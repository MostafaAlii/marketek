<?php
namespace App\Exports;
use App\Models\Section;
use Maatwebsite\Excel\Concerns\FromCollection;
class SectionExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Section::all();
    }
}
