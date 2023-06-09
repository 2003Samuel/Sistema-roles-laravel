<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// Spatie
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-rol', ['only' => ['index']]);

        $this->middleware('permission:crear-rol', ['only' => ['create', 'store']]);

        $this->middleware('permission:editar-rol', ['only' => ['edit', 'update']]);

        $this->middleware('permission:borrar-rol', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::paginate(5);

        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permission = Permission::get();

        return view('roles.create', compact('permission'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required',
                'permission' => 'required'
            ]
        );

        $existenciaRol = Role::select('name')->where('name', $request->name)->get();

        if (empty($existenciaRol[0])) {
            $rol = Role::create(['name' => $request->input('name')]);
            $rol->syncPermissions($request->input('permission'));
            $mensaje = (['success' => 'Se registro con exito']);
        } else {
            $mensaje = (['error' => 'Ya existe el rol ingresado']);
        }

        return redirect()->route('roles.index')->with($mensaje);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $permission = Permission::get();
        $rolePermissions = DB::table('role_has_permissions')->where('role_has_permissions.role_id', $id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();

        return view('roles.edit', compact('role', 'permission', 'rolePermissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, ['name' => 'required', 'permission' => 'required']);

        $role = Role::findOrFail($id);
        $role->name = $request->input('name');
        $role->save();

        $role->syncPermissions($request->input('permission'));
        $mensaje = (['update' => 'Se actualizo con exito']);

        return redirect()->route('roles.index')->with($mensaje);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rol = Role::findOrFail($id);
        $rol->delete();

        return redirect()->route('roles.index');
    }
}
