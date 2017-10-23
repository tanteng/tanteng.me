<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('roles')->paginate(10);
        foreach ($users as $user) {
            $hasRoles = $user->roles;
            $roleDisplayNames = [];
            foreach ($hasRoles as $role) {
                $roleDisplayNames[] = $role->display_name;
            }
            $user->roleDisplayNames = implode(',', $roleDisplayNames);
        }
        return view('admin.user.list', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.add');
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
            'name'     => 'required|max:255|unique:users',
            'email'    => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
        ]);
        $data = $request->all();
        $create = [
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => bcrypt($data['password']),
        ];
        $status = User::create($create);
        if ($status) {
            return redirect()->route('user.index')->with('info', '添加用户成功!');
        }
        return redirect()->route('user.index')->with('info', '操作失败!');
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
        $user = User::findOrFail($id);
        $hasRoles = $this->hasRoles($user);
        $roles = Role::all();
        return view('admin.user.edit', compact('user', 'roles', 'hasRoles'));
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
            'name'  => 'required|max:255|unique:users,name,' . $id,
            'email' => 'required|email|max:255|unique:users,email,' . $id,
        ]);

        //保存用户信息
        $data = $request->all();
        $user = User::find($id);
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->save();

        //添加和删除角色
        $seletedRoles = isset($data['role']) ? $data['role'] : [];
        $hasRoles = $this->hasRoles($user);
        $addRoles = array_diff($seletedRoles, $hasRoles);
        $delRoles = array_diff($hasRoles, $seletedRoles);
        if ($addRoles) {
            $user->attachRoles($addRoles);
        }
        if ($delRoles) {
            $user->detachRoles($delRoles);
        }

        return redirect()->back()->with('success', '修改成功!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * 用户拥有的角色
     * @param User $user
     * @return array
     */
    private function hasRoles(User $user)
    {
        $roles = $user->roles()->get();
        $roleIds = [];
        foreach ($roles as $role) {
            $roleIds[] = $role->id;;
        }
        return $roleIds;
    }
}
