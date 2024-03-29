<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            PermissionsTableSeeder::class,
            RolesTableSeeder::class,
            PermissionRoleTableSeeder::class,
            UsersTableSeeder::class,
            RoleUserTableSeeder::class,
            PhasesTableSeeder::class,
            SubphasesTableSeeder::class,
            SubscribersTableSeeder::class,
            CountriesTableSeeder::class,
            TaskTableSeeder::class,
            BooksTableSeeder::class,
            // BinshopsLanguagesTableSeeder::class,
        ]);
    }
}
