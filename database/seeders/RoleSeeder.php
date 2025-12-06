<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $roles = [
            'admin',
            'lecture',
            'student',
        ];

        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role]);
        }

        $permissions = [

            // Course Permissions
            'course.create',
            'course.update',
            'course.delete',
            'course.view_all',
            'course.view_own',

            // Enrollment Permissions
            'enrollment.manage',
            'enrollment.view_all',
            'enrollment.view_own',

            // Assignment Permissions
            'assignment.create',
            'assignment.submit',
            'assignment.grade',
            'assignment.view_all',
            'assignment.view_own',

            // Forum Permissions
            'forum.post',
            'forum.manage',
            'forum.view_all',
            'forum.view_own',

            // Grade Permissions
            'grade.manage',
            'grade.view_all',
            'grade.view_own',

            // User Permissions
            'user.manage',
            'user.view',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Role Instances
        $admin   = Role::where('name', 'admin')->first();
        $lecture = Role::where('name', 'lecture')->first();
        $student = Role::where('name', 'student')->first();

        // Assign Permissions to Admin
        $admin->givePermissionTo(Permission::all());


        // Assign Permissions to Lecturer
        $lecture->givePermissionTo([
            'course.create',
            'course.update',
            'course.delete',
            'course.view_own',
            'enrollment.manage',
            'assignment.create',
            'assignment.grade',
            'assignment.view_own',
            'forum.post',
            'forum.manage',
            'grade.manage',
            'grade.view_all',
            'user.view',
        ]);

        // Assign Permissions to Student
        $student->givePermissionTo([
            'course.view_own',
            'assignment.submit',
            'assignment.view_own',
            'forum.post',
            'forum.view_own',
            'grade.view_own',
        ]);
    }
}
