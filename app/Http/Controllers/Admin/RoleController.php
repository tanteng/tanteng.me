<?php

namespace App\Http\Controllers\Admin;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::with('perms')->paginate(10);
        foreach ($roles as $role) {
            $permissionDisplayNames = [];
            $permissions = $role->perms;
            foreach ($permissions as $permission) {
                $permissionDisplayNames[] = $permission->display_name;
            }
            $role->permissionDisplayNames = implode(',', $permissionDisplayNames);
        }
        return view('admin.role.list', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.role.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'         => 'required|max:255|unique:roles',
            'display_name' => 'required|max:255|unique:roles',
        ]);
        $data = $request->all();
        $role = new Role();
        $role->name = $data['name'];
        $role->display_name = $data['display_name'];
        $role->description = $data['description'];
        $role->save();

        return redirect()->route('role.index')->with('info', '添加角色成功');
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
        $hasPermissions = $this->hasPermissions($role);
        $permissions = Permission::all();
        return view('admin.role.edit', compact('role', 'permissions', 'hasPermissions'));
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
        $this->validate($request, [
            'name'         => 'required|max:255|unique:roles,name,' . $id,
            'display_name' => 'required|max:255|unique:roles,display_name,' . $id,
        ]);
        $data = $request->all();
        $role = Role::findOrFail($id);
        $role->name = $data['name'];
        $role->display_name = $data['display_name'];
        $role->description = $data['description'];
        $role->save();

        //添加和删除角色
        $seletedPermissions = isset($data['permission']) ? $data['permission'] : [];
        $hasPermissions = $this->hasPermissions($role);
        $addPermissions = array_diff($seletedPermissions, $hasPermissions);
        $delPermissions = array_diff($hasPermissions, $seletedPermissions);
        if ($addPermissions) {
            $role->attachPermissions($addPermissions);
        }
        if ($delPermissions) {
            $role->detachPermissions($delPermissions);
        }

        return redirect()->back()->with('info', '修改成功!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::find($id);
        $result = $role->delete();
        if ($result) {
            return response()->json(['result' => 0, 'msg' => '删除成功!', 'data' => []]);
        }
        return response()->json(['result' => 1001, 'msg' => '删除失败!', 'data' => []]);
    }

    /**
     * 角色已经有的权限
     * @param Role $role
     * @return array
     */
    private function hasPermissions(Role $role)
    {
        $persimissons = $role->perms()->get();
        $permissionsIds = [];
        foreach ($persimissons as $persimisson) {
            $permissionsIds[] = $persimisson->id;;
        }
        return $permissionsIds;
    }
}
