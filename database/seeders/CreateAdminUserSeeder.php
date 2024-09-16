<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin User
        $admin = User::create([
            'name' => 'Admin User', 
            'email' => 'admin@reliance.com',
            'password' => bcrypt('admin123')
        ]);
        
        $adminRole = Role::create(['name' => 'Admin']);
        $permissions = Permission::pluck('id', 'id')->all();
        $adminRole->syncPermissions($permissions);
        $admin->assignRole($adminRole);

        // Scheduler User
        $scheduler = User::create([
            'name' => 'Scheduler User', 
            'email' => 'scheduler@reliance.com',
            'password' => bcrypt('scheduler123')
        ]);
        
        $schedulerRole = Role::create(['name' => 'Scheduler']);
        $scheduler->assignRole($schedulerRole);

        // Cleaner User
        $cleaner = User::create([
            'name' => 'Cleaner User', 
            'email' => 'cleaner@reliance.com',
            'password' => bcrypt('cleaner123')
        ]);
        
        $cleanerRole = Role::create(['name' => 'Cleaner']);
        $cleaner->assignRole($cleanerRole);

        // Client User
        $client = User::create([
            'name' => 'Client User', 
            'email' => 'client@reliance.com',
            'password' => bcrypt('client123')
        ]);
        
        $clientRole = Role::create(['name' => 'Client']);
        $client->assignRole($clientRole);
    }
}
