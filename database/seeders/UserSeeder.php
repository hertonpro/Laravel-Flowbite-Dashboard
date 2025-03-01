<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Super Admin - Accès total
        $superAdmin = User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@example.com',
            'password' => Hash::make('password123'),
        ]);
        $superAdmin->assignRole('super-admin');

        // Admin - Gestion des utilisateurs et accès complet aux fonctionnalités
        $admin = User::create([
            'name' => 'Administrateur',
            'email' => 'admin@example.com',
            'password' => Hash::make('password123'),
        ]);
        $admin->assignRole('admin');

        // Manager des Projets
        $projectManager = User::create([
            'name' => 'Manager Projets',
            'email' => 'projets@example.com',
            'password' => Hash::make('password123'),
        ]);
        $projectManager->assignRole('manager');
        $projectManager->givePermissionTo([
            'view projects',
            'create projects',
            'edit projects',
            'delete projects',
            'view reports'
        ]);

        // Manager des Rapports
        $reportManager = User::create([
            'name' => 'Manager Rapports',
            'email' => 'rapports@example.com',
            'password' => Hash::make('password123'),
        ]);
        $reportManager->assignRole('manager');
        $reportManager->givePermissionTo([
            'view reports',
            'create reports',
            'edit reports',
            'delete reports',
            'view projects'
        ]);

        // Éditeur de Contenu
        $editor = User::create([
            'name' => 'Éditeur',
            'email' => 'editeur@example.com',
            'password' => Hash::make('password123'),
        ]);
        $editor->assignRole('user');
        $editor->givePermissionTo([
            'view projects',
            'edit projects',
            'view reports',
            'create reports'
        ]);

        // Analyste
        $analyst = User::create([
            'name' => 'Analyste',
            'email' => 'analyste@example.com',
            'password' => Hash::make('password123'),
        ]);
        $analyst->assignRole('user');
        $analyst->givePermissionTo([
            'view reports',
            'create reports',
            'view projects'
        ]);

        // Utilisateur Standard
        $standardUser = User::create([
            'name' => 'Utilisateur',
            'email' => 'user@example.com',
            'password' => Hash::make('password123'),
        ]);
        $standardUser->assignRole('user');
        $standardUser->givePermissionTo([
            'view projects',
            'view reports'
        ]);

        // Utilisateur en Lecture Seule
        $readOnlyUser = User::create([
            'name' => 'Lecteur',
            'email' => 'lecteur@example.com',
            'password' => Hash::make('password123'),
        ]);
        $readOnlyUser->assignRole('user');
        $readOnlyUser->givePermissionTo([
            'view projects'
        ]);
    }
}
