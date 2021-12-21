<?php
namespace App\Http\Traits\Dashboard;
use App\Models\Image;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
trait Upload {
    public function verifyAndStoreImage(Request $request, $inputname, $foldername, $disk, $imageable_id, $imageable_type) {
        if($request->hasFile($inputname)) {
            // Check Img
            if(!$request->file($inputname)->isValid()) {
                flash('Invalid Image!')->error()->important();
                return redirect()->back()->withInput();
            }

            $photo = $request->file($inputname);
            $name = Str::slug($request->first_name . $request->last_name);
            $filename = $name. '.' . $photo->getClientOriginalExtension();

            // Store Image
            $Image = new Image();
            $Image->filename = $filename;
            $Image->imageable_id = $imageable_id;
            $Image->imageable_type = $imageable_type;
            $Image->save();
            return $request->file($inputname)->storeAs($foldername, $filename, $disk);
         }
         return null;
    }
}