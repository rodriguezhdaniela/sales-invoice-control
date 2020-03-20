<?php

namespace App\Http\Controllers\Admin;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $roles = Role::paginate();

        return response()->view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Role $role
     * @return Response
     */
    public function create(Role $role)
    {
        $permissions = Permission::get();

        return response()->view('roles.create', compact('role', 'permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {

        //create permissions
        $role = Role::create(['name' => $request->input('name')]);

        //create permissions
        $role->syncPermissions($request->input('permission'));

        /*$role = new Role($request->all());
        $role->givePermissionTo($request->permissions);
        $role->save();*/

        return redirect()->route('roles.index')->withSuccess(__('Role created sucessfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return Response
     */
    public function show($id)
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions", "role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$id)
            ->get();

        return response()->view('roles.show', compact('role', 'rolePermissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return Response
     */
    public function edit($id)
    {
        $role = Role::find($id);
        $permissions = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();

        return response()->view('roles.edit', compact('role', 'permissions', 'rolePermissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return void
     */
    public function update(Request $request, $id)
    {

        //update role
        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();

        //update permission
        $role->syncPermissions($request->input('permission'));

        return redirect()->route('roles.index')->withSuccess(__('Role updated sucessfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Role $role
     * @return void
     * @throws Exception
     */
    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->route('roles.index')->withSuccess(__('Role deleted sucessfully'));
    }
}
