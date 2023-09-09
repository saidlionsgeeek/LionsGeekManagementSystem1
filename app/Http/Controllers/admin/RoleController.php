<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::whereNotIn("name", ['admin'])->get();
        return view("admin.roles.index", compact("roles"));
    }
    public function create()
    {
        return view("admin.roles.create");
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => ["required", "min:3"]
        ]);
        $role = Role::where("name",$request->name)->first();
        if ($role == $request->name) {
            return redirect()->back()->with("error","Utilisateur créé avec succès");
        }
        Role::create([
            'name' => $request->name,
        ]);
        return redirect()->back();
    }
    public function edit(Role $role)
    {
        return view('admin.roles.edit', compact('role'));
    }
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => ["required", "min:3"]
        ]);
        $role->update([
            'name' => $request->name,
        ]);
        return redirect()->route("admin.roles.index");
    }
    public function destroy(Role $role)
    {

        $role = Role::find($role->id); // Replace $roleId with the ID of the role you want to delete

        if ($role && !$role->users()->exists()) {
            // No users have this role, it's safe to delete
            $role->delete();
            Session::flash('success', 'Role deleted successfully.');
            return redirect()->back();
        } else {
            // Users have this role, don't delete it
            // You can handle this case as needed, such as displaying an error message
            Session::flash('error', 'Role could not be deleted because users have this role.');
            return redirect()->back();
        }
    }
}
