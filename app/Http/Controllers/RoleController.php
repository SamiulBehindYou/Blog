<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function permission(){
        $permissions = Permission::all();
        return view('admin.role_manager.permission', compact('permissions'));
    }

    public function permission_store(Request $request){
        $permission = Permission::create(['name' => $request->permission_name]);
        return back()->withSuccess('Permission Added!');
    }

    public function role(){
        $permissions = Permission::all();
        $roles = Role::all();
        return view('admin.role_manager.roles', compact('roles', 'permissions'));
    }

    public function role_store(Request $request){
        $request->validate([
            'role_name' => 'required',
            'permission' => 'required',
        ]);
        $role = Role::create(['name' => $request->role_name]);
        $role->givePermissionTo($request->permission);
        return back()->withSuccess('New Role Added!');
    }

    public function role_detete($role_id){
        DB::table('role_has_permissions')->where('role_id', $role_id)->delete();
        Role::find($role_id)->delete();
        return back()->withInfo('Role Deleted!');
    }

    public function assignment(){
        $users = User::all();
        $roles = Role::all();
        return view('admin.role_manager.assgin_role',[
            'users' => $users,
            'roles' => $roles,
        ]);
    }

    public function assign_role(Request $request){
        $user = User::find($request->user_id);
        $user->assignRole($request->role);
        return back()->withSuccess('Role Assign successfully!');
    }

    public function remove_role(Request $request){
        $request->validate([
            'role' => 'required',
        ]);
        $user = User::find($request->user_id);
        $user->removeRole($request->role);
        return back()->withSuccess('Role Removed successfully!');
    }
}
