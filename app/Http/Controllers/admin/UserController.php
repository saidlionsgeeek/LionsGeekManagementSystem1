<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\DemoMail;
use Illuminate\Support\Facades\Mail as FacadesMail;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $roles = Role::whereNotIn("name",['admin'])->get() ;
        $users = User::all();
        return view("admin.users.index", compact("users","roles"));
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
            'email'=>['required']
        ]);

        $exist = User::where("email", $request->email)->first();
        if ($request->type == "interne") {
            if (!$exist) {
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
                "email" => "7na l9owa tzadina biha",
                "password" => $password
            ];
            FacadesMail::to($request->email)->send(new DemoMail($mailData));
        }
        }else if ($request->type == "externe") {
            if (!$exist) {
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
                "email" => "7na l9owa tzadina biha",
                "password" => $password
            ];
            FacadesMail::to($request->email)->send(new DemoMail($mailData));
        }
        }
        
        return redirect()->back();
    }

    public function assignRole(Request $request , User $user)
    {
        if ($user->hasRole($request->role)) {
            return back()->with("message",'role exists');
        }
        $user->assignRole($request->role);
        return back()->with("message",'role assigned');
    }


    public function removerole(User $user , Role $role)
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
