<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Classe;
use App\Models\ClasseImg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;


class ClasseController extends Controller
{
    public function index()
    {
        $classes = Classe::all();
        return view("admin.classes.index", compact("classes"));
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

            $id_class = Classe::create($data)->id;

            $images = $request->file("img_url");


            foreach ($images as $image) {
                $compressedImage = Image::make($image)->resize(800, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->encode('jpg', 20);
                $filename = $image->hashName();

                Storage::disk('public')->put('imgs/classeImgs/' . $filename, $compressedImage->stream('jpg', 20));

                $data1 = [
                    "classe_id" => $id_class,
                    "img_url" => $filename,
                ];
                ClasseImg::create($data1);
            }
        }
        return redirect()->back();
    }
    public function update(Request $request, Classe $classe)
    {
        request()->validate([
            "name" => ["required"],
            "description" => ["required"],
        ]);

        $data = [
            "name" => $request->name,
            "description" => $request->description
        ];
        $classe->update($data);
        return redirect()->back();
    }
    public function destroy(Classe $classe)
    {
        $salles =  ["Salle 1","Salle 2","Salle 3","Salle 4","Salle 5", "salle 6"];

        if (!in_array($classe->name, $salles)){
            // dd($classe->name);
            
                $classeimages = ClasseImg::where('classe_id', $classe->id)->get();
        
                foreach ($classeimages as $classeimage) {
                    Storage::disk("public")->delete('imgs/classeImgs/' . $classeimage->img_url);
                }
        
                $classe->delete();
            
        }

        return redirect()->back();
    }
}
