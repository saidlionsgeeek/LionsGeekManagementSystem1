<?php

namespace App\Http\Controllers\admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\DemoMail;
use App\Mail\RolesAssigneMail;
use Illuminate\Support\Facades\Mail as FacadesMail;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $roles = Role::whereNotIn("name", ['admin'])->get();
        $users = User::all();
        return view("admin.users.index", compact("users", "roles"));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => ["required"],
            'lastname' => ["required"],
            'cin' => ["required"],
            'gender' => ["required"],
            'phone' => ["required"],
            'type' => ["required"],
            'email' => ['required']
        ]);

        $exist = User::where("email", $request->email)->first();
        // pour vérifier c'est l'eamil deja sur notre database
        if (!$exist) { 
            if ($request->type == "interne") {
                $password = Str::random(12);
                User::create([
                    "name" => $request->name,
                    "lastname" => $request->lastname,
                    "cin" => $request->cin,
                    "gender" => $request->gender,
                    "phone" => $request->phone,
                    "type" => $request->type,
                    "email" => $request->email,
                    "password" => $password
                ])->assignRole('interne');
                $mailData = [
                    "email" => "tu es été ajouté par lionesGeek avec rôle interne",
                    "password" => $password
                ];
                FacadesMail::to($request->email)->send(new DemoMail($mailData));
            } else if ($request->type == "externe") {

                $password = Str::random(12);
                User::create([
                    "name" => $request->name,
                    "lastname" => $request->lastname,
                    "cin" => $request->cin,
                    "gender" => $request->gender,
                    "phone" => $request->phone,
                    "type" => $request->type,
                    "email" => $request->email,
                    "password" => $password
                ])->assignRole('externe');

                $mailData = [
                    "email" => "tu es été ajouté par lionesGeek avec rôle externe",
                    "password" => $password
                ];
                FacadesMail::to($request->email)->send(new DemoMail($mailData));
            }
        }

        // $selectedCheckboxes = $request->input('checklist');

        // foreach($selectedCheckboxes as $selectedCheckboxe){
        //     if ($selectedCheckboxe == "") {
        //         $user
        //     }
        // }

        return redirect()->back();
    }

    public function assignRole(Request $request, User $user)
    {
        if ($user->hasRole($request->role)) {
            return back()->with("message", 'role exists');
        }

        if ($request->role == "Gestionnaire des studios") {
            $mailData1 = [
                "email" => "Félicitations, tu es devenu " . $request->role . " chez Liones Geek.",
                "password" => "Vous pouvez maintenant réserver votre studio avec l'équipement que vous souhaitez sur notre site web."

            ];
            $user->assignRole($request->role);
            FacadesMail::to($user->email)->send(new RolesAssigneMail($mailData1));
        } else if ($request->role == "Gestionnaire des classes") {
            $mailData1 = [
                "email" => "Félicitations, tu es devenu " . $request->role . " chez Liones Geek.",
                "password" => "Vous pouvez maintenant réserver votre classe que vous souhaitez sur notre site web."

            ];
            $user->assignRole($request->role);
            FacadesMail::to($user->email)->send(new RolesAssigneMail($mailData1));
        } else {
            $mailData1 = [
                "email" => "Félicitations, tu es devenu " . $request->role . " chez Liones Geek.",
                "password" => "Tu peux maintenant avoir accès pour voir toutes les réservations auxquelles tu es associé(e)."

            ];
            $user->assignRole($request->role);
            FacadesMail::to($user->email)->send(new RolesAssigneMail($mailData1));
        }
        return back()->with("message", 'role assigned');
    }


    public function removerole(User $user, Role $role)
    {
        if ($user->hasRole($role)) {
            $user->removeRole($role);
            return back();
        }
        return back();
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back();
    }
}
