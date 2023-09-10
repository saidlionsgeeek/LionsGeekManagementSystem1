<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Studio;
use App\Models\StudioImg;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudioController extends Controller
{
    public function index()
    {
        $studios = Studio::all();
        return view("admin.studios.index", compact("studios"));
    }
    public function store(Request $request)
    {
        request()->validate([
            "name" => ["required"],
            "description" => ["required"],
            "img_url.*" => "required|image|mimes:png,jpg,jpeg,gif"
        ]);
        if ($request->hasFile('img_url')) {
            $data = [
                "name" => $request->name,
                "description" => $request->description
            ];

            $id_studio = Studio::create($data)->id;


            $images = $request->file("img_url");


            foreach ($images as $image) {
                $compressedImage = Image::make($image)->resize(800, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->encode('jpg', 20);
                $filename = $image->hashName();

            Storage::disk('public')->put('imgs/studioImgs/' . $filename, $compressedImage->stream('jpg', 20));

                $data1 = [
                    "studio_id" => $id_studio,
                    "img_url" => $filename,
                ];
                StudioImg::create($data1);
            }
            return redirect()->back();
        }
    }

    public function update(Request $request, Studio $studio)
    {
        request()->validate([
            "name" => ["required"],
            "description" => ["required"],
        ]);

        $data = [
            "name" => $request->name,
            "description" => $request->description
        ];
        $studio->update($data);
        return redirect()->back();
    }
    public function destroy(Studio $studio)
    {

        $studios = ["Studio 1", "Studio 2", "Espace cafe", "Espace Agora", "Co-working", "Externe"];

        if (!in_array($studio->name, $studios)){
            // dd($classe->name);
            $studioimages = StudioImg::where('studio_id', $studio->id)->get();

            foreach ($studioimages as $studioimage) {
                Storage::disk("public")->delete('Imgs/studioImgs/' . $studioimage->img_url);
            }
            
            $studio->delete();
        }

        return redirect()->back();
    }
}
