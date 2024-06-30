<?php

namespace App\Http\Controllers;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function principal()
    {
        $roles = Role::withTrashed()->paginate(5);
        return view('roles.principal', ['roles' => $roles]);
    }

    public function crear()
    {
        return view('roles.crear');
    }

    public function mostrar($variable)
    {
        $role = Role::find($variable);
        return view("roles.mostrar", compact('role'));
    }

    public function store(Request $request)
    {
        $role = new Role();
        $role->nombre = $request->nombre;
        $role->descripcion = $request->descripcion;
        $role->save();

        return redirect()->route('role.mostrar', $role->id);
    }

    public function borrar($id)
    {
        $role = Role::withTrashed()->find($id);
        $role->forceDelete();
        return redirect()->route('role.principal');
    }

    public function desactivarole($id)
    {
        $role = Role::find($id);
        $role->delete();
        return redirect()->route('role.principal');
    }

    public function activarole($id)
    {
        $role = Role::withTrashed()->find($id);
        $role->restore();
        return redirect()->route('role.principal');
    }

    public function editar(Role $role)
    {
        return view('roles.editar', compact('role'));
    }

    public function update(Request $request, Role $role)
    {
        $role->nombre = $request->nombre;
        $role->descripcion = $request->descripcion;
        $role->save();

        return redirect()->route('role.mostrar', $role->id);
    }
}
