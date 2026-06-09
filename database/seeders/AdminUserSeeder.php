<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $adminUser = User::updateOrCreate(
['email' => 'admin@mysite.com'],
[
'name' => 'Admin User',
'password' => Hash::make('12345'),
]
);
$adminRole = Role::where('name', 'admin')->first();
$userRole = Role::where('name', 'user')->first();
$adminUser->roles()->syncWithoutDetaching([
$adminRole->id,
$userRole->id,
]);
    }
}
