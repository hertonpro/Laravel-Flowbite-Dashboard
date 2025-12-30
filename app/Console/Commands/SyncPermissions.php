<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use ReflectionClass;

class SyncPermissions extends Command
{
    protected $signature = 'sync:permissions {controller?} {--all : Sync all admin controllers}';
    protected $description = 'Sync permissions for controller methods and assign to admin roles';

    public function handle()
    {
        if ($this->option('all')) {
            return $this->syncAllControllers();
        }

        $controller = $this->argument('controller');
        
        if (!$controller) {
            $controller = $this->ask('Which controller do you want to sync? (e.g., UserController, ProductController)');
        }

        if (!$controller) {
            $this->error('Controller name is required!');
            return 1;
        }

        return $this->syncController($controller);
    }

    private function syncController($controllerName)
    {
        // Normalize controller name
        $controllerName = Str::studly($controllerName);
        if (!Str::endsWith($controllerName, 'Controller')) {
            $controllerName .= 'Controller';
        }

        $controllerClass = "App\\Http\\Controllers\\Admin\\{$controllerName}";

        if (!class_exists($controllerClass)) {
            $this->error("Controller {$controllerClass} not found!");
            return 1;
        }

        $this->info("🔄 Analyzing controller: {$controllerClass}");

        $reflection = new ReflectionClass($controllerClass);
        $methods = $reflection->getMethods(\ReflectionMethod::IS_PUBLIC);

        $resourceName = $this->getResourceName($controllerName);
        $createdPermissions = [];

        foreach ($methods as $method) {
            // Skip constructor and inherited methods
            if ($method->getDeclaringClass()->getName() !== $controllerClass || 
                $method->getName() === '__construct') {
                continue;
            }

            $permission = $this->generatePermission($method->getName(), $resourceName);
            
            if ($permission && $this->createPermission($permission)) {
                $createdPermissions[] = $permission;
            }
        }

        if (empty($createdPermissions)) {
            $this->warn('No new permissions to create.');
            return 0;
        }

        $this->assignToAdminRoles($createdPermissions);
        
        $this->info('✅ Permissions synchronized successfully!');
        $this->table(['Permission'], array_map(fn($p) => [$p], $createdPermissions));

        return 0;
    }

    private function syncAllControllers()
    {
        $this->info('🔄 Scanning all admin controllers...');
        
        $controllersPath = app_path('Http/Controllers/Admin');
        $files = glob($controllersPath . '/*.php');
        
        foreach ($files as $file) {
            $controllerName = basename($file, '.php');
            if ($controllerName !== 'Controller') {
                $this->syncController($controllerName);
            }
        }

        return 0;
    }

    private function getResourceName($controllerName)
    {
        // UserController -> users
        // ProductController -> products  
        $name = Str::replaceLast('Controller', '', $controllerName);
        return Str::plural(Str::snake(Str::camel($name), ' '));
    }

    private function generatePermission($methodName, $resourceName)
    {
        $actionMappings = [
            'index' => 'view',
            'show' => 'view', 
            'create' => 'create',
            'store' => 'create',
            'edit' => 'edit',
            'update' => 'edit',
            'destroy' => 'delete',
            'delete' => 'delete'
        ];

        if (isset($actionMappings[$methodName])) {
            return $actionMappings[$methodName] . ' ' . $resourceName;
        }

        // For custom methods, use method name as action
        return Str::snake($methodName, ' ') . ' ' . $resourceName;
    }

    private function createPermission($permissionName)
    {
        if (Permission::where('name', $permissionName)->exists()) {
            $this->line("  ⚠️  Permission '{$permissionName}' already exists");
            return false;
        }

        Permission::create(['name' => $permissionName]);
        $this->line("  ✅ Created permission: {$permissionName}");
        return true;
    }

    private function assignToAdminRoles($permissions)
    {
        $adminRoles = ['admin', 'super-admin'];
        
        foreach ($adminRoles as $roleName) {
            $role = Role::where('name', $roleName)->first();
            
            if ($role) {
                $role->givePermissionTo($permissions);
                $this->line("  🔑 Assigned permissions to role: {$roleName}");
            }
        }
    }
}