<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class PermissionController extends Controller
{
    public function index()
    {
        $roles = Role::with('permissions')->get();
        $permissions = Permission::all()->groupBy(function($permission) {
            $parts = explode(' ', $permission->name);
            return count($parts) > 1 ? $parts[1] : 'other';
        });
        $users = User::with('roles')->get();

        return view('admin.permissions.index', compact('roles', 'permissions', 'users'));
    }

    public function storeRole(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'unique:roles,name', 'max:255'],
            'permissions' => ['sometimes', 'array'],
            'permissions.*' => ['exists:permissions,name'],
        ]);

        $role = Role::create(['name' => $request->name]);

        if ($request->has('permissions')) {
            $role->syncPermissions($request->permissions);
        }

        return redirect()
            ->route('admin.permissions.index')
            ->with('success', __('Role created successfully'));
    }

    public function updateRole(Request $request, Role $role)
    {
        $request->validate([
            'name' => ['required', 'string', 'unique:roles,name,' . $role->id, 'max:255'],
            'permissions' => ['sometimes', 'array'],
            'permissions.*' => ['exists:permissions,name'],
        ]);

        $role->update(['name' => $request->name]);

        if ($request->has('permissions')) {
            $role->syncPermissions($request->permissions);
        } else {
            $role->syncPermissions([]);
        }

        return redirect()
            ->route('admin.permissions.index')
            ->with('success', __('Role updated successfully'));
    }

    public function destroyRole(Role $role)
    {
        // Vérifier si le rôle est assigné à des utilisateurs
        if ($role->users()->count() > 0) {
            return redirect()
                ->route('admin.permissions.index')
                ->with('error', __('Cannot delete role that is assigned to users'));
        }

        $role->delete();

        return redirect()
            ->route('admin.permissions.index')
            ->with('success', __('Role deleted successfully'));
    }

    public function updateUserRoles(Request $request, User $user)
    {
        $request->validate([
            'roles' => ['sometimes', 'array'],
            'roles.*' => ['exists:roles,name'],
        ]);

        if ($request->has('roles')) {
            $user->syncRoles($request->roles);
        } else {
            $user->syncRoles([]);
        }

        return redirect()
            ->route('admin.permissions.index')
            ->with('success', __('User roles updated successfully'));
    }
}