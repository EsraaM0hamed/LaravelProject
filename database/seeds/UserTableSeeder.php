<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_employee = Role::where('name', 'employee')->first();
        $role_manager  = Role::where('name', 'manager')->first();
    
        $employee = new User();
        $employee->name = 'Employee Name';
        $employee->email = 'employee@example.com';
        $employee->password = bcrypt('secret');
        $employee->save();
        $employee->roles()->attach($role_employee);
    
        $manager = new User();
        $manager->name = 'admin';
        $manager->email = 'admin@admin.com';
        $manager->password = bcrypt('admin123');
        $manager->save();
        $manager->roles()->attach($role_manager);
    }
}
