<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Classe;
use App\Models\ClasseImg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class ClassImageController extends Controller
{
    // public function index()
    // {
    //     $classe_images = ClasseImg::all();
    //     return view("Admin.partials.classess.create_classe_img", compact("classe_images"));
    // }

    public function store(Request $request, Classe $classe)
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
    
                Storage::disk('public')->put('imgs/classeImgs/' . $filename, $compressedImage->stream('jpg', 20));
    
                $data = [
                    "classe_id" => $classe->id,
                    "img_url" =>  $filename, 
                ];
    
                ClasseImg::create($data);
            }
        }

        return redirect()->back();
    }


    public function destroy(ClasseImg $classeImg)
    {
        Storage::disk("public")->delete('Imgs/classeImgs/' . $classeImg->img_url);
        $classeImg->delete();
        return redirect()->back();
    }
}
