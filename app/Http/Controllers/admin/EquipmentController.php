<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Equipement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;


class EquipmentController extends Controller
{
    public function index()
    {
        $equipments = Equipement::all();
        return view("admin.equipments.index", compact("equipments"));
    }

    public function store(Request $request)
    {
        request()->validate([
            "name" => ["required"],
            "stock" => ["required"],
            "ref" => ["required"],
            "state" => ["required"],
            "img_url" => "required|image|mimes:png,jpg,jpeg,gif"
        ]);
        if ($request->hasFile('img_url')) {

            $img = $request->file("img_url");
            $compressedImage = Image::make($img)->resize(800, null, function ($constraint) {
                $constraint->aspectRatio();
            })->encode('jpg', 20);
            $filename = $img->hashName();
            Storage::disk('public')->put('imgs/equipmentImgs/' . $filename, $compressedImage->stream('jpg', 20));


            $data = [
                "name" => $request->name,
                "ref" => $request->ref,
                "stock" => $request->stock,
                "state" => (bool)$request->state,
                "img_url" => $filename,
            ];

            Equipement::create($data);
            return redirect()->back();
        }
    }

    public function destroy(Equipement $equipment)
    {

        if(!str_contains($equipment->img_url, 'Equipment')) {
            Storage::disk("public")->delete('imgs/equipmentImgs/' . $equipment->img_url);
        }

        $equipment->delete();

        return redirect()->back();
    }

    public function state(Equipement $equipment) {
        $equipment->update([
            'state' => !$equipment->state,
        ]);

        return back();
    }
}
