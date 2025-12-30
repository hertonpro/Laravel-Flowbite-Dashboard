<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // Réinitialiser les caches des rôles et permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Créer les permissions
        $permissions = [
            // Permissions utilisateurs
            'view users',
            'create users',
            'edit users',
            'delete users',

            // Permissions blogs
            'view blogs',
            'create blogs',
            'edit blogs',
            'delete blogs',

            // Permissions permissions
            'view permissions',
            'create permissions',
            'edit permissions',
            'delete permissions',

            // Permissions rapports
            'view reports',
            'create reports',
            'edit reports',
            'delete reports',

            // Permissions paramètres
            'view settings',
            'edit settings'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Créer les rôles et assigner les permissions
        // Rôle Super Admin
        $superAdminRole = Role::create(['name' => 'super-admin']);
        $superAdminRole->givePermissionTo(Permission::all());

        // Rôle Admin
        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo([
            'view users',
            'create users',
            'edit users',
            'view blogs',
            'create blogs',
            'edit blogs',
            'delete blogs',
            'view permissions',
            'create permissions',
            'edit permissions',
            'delete permissions',
            'view reports',
            'create reports',
            'edit reports',
            'view settings',
            'edit settings'
        ]);

        // Rôle Manager
        $managerRole = Role::create(['name' => 'manager']);
        $managerRole->givePermissionTo([
            'view users',
            'view blogs',
            'create blogs',
            'edit blogs',
            'view reports',
            'create reports',
            'edit reports',
            'view settings'
        ]);

        // Rôle Utilisateur
        $userRole = Role::create(['name' => 'user']);
        $userRole->givePermissionTo([
            'view blogs',
            'view reports',
            'view settings'
        ]);
    }
}
