<?php

namespace Database\Seeders;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
          // Reset cached roles and permissions
          app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

          // create permissions
          $role = Role::create(['name' => 'super-admin']);
          $role = Role::create(['name' => 'cliente']);
          $role = Role::create(['name' => 'vendedor']);

          $user =User::create([
            'name' => 'Daniel',
            'lastname' => 'Jojoa',
            'email' => 'danielinsandara@udenar.edu.co',
            'password' => Hash::make('asdf'),
        
        ]);
        $user->assignRole('super-admin'); 


    }
}
