<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Studio;
use App\Models\StudioImg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class StudioImageController extends Controller
{
    public function store(Request $request, Studio $studio)
    {
        request()->validate([
            "img_url.*" => "required|image|mimes:png,jpg,jpeg,gif"
        ]);
        if ($request->hasFile('img_url')) {
            $images = $request->file("img_url");
            foreach ($images as $image) {
                $compressedImage = Image::make($image)->resize(800, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->encode('jpg', 20);
                $filename = $image->hashName();

                Storage::disk('public')->put('imgs/studioImgs/' . $filename, $compressedImage->stream('jpg', 20));

                $data = [
                    "img_url" => $filename,
                    "studio_id" => $studio->id
                ];
                StudioImg::create($data);
            }
        }

        return redirect()->back();
    }

    public function destroy(StudioImg $studioImg)
    {
        Storage::disk("public")->delete('Imgs/studioImgs/' . $studioImg->img_url);
        $studioImg->delete();
        return redirect()->back();
    }
}
