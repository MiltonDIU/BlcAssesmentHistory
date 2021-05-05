<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
//            [
//                'id'    => 1,
//                'title' => 'user_management_access',
//            ],
//            [
//                'id'    => 2,
//                'title' => 'permission_create',
//            ],
//            [
//                'id'    => 3,
//                'title' => 'permission_edit',
//            ],
//            [
//                'id'    => 4,
//                'title' => 'permission_show',
//            ],
//            [
//                'id'    => 5,
//                'title' => 'permission_delete',
//            ],
//            [
//                'id'    => 6,
//                'title' => 'permission_access',
//            ],
//            [
//                'id'    => 7,
//                'title' => 'role_create',
//            ],
//            [
//                'id'    => 8,
//                'title' => 'role_edit',
//            ],
//            [
//                'id'    => 9,
//                'title' => 'role_show',
//            ],
//            [
//                'id'    => 10,
//                'title' => 'role_delete',
//            ],
//            [
//                'id'    => 11,
//                'title' => 'role_access',
//            ],
//            [
//                'id'    => 12,
//                'title' => 'user_create',
//            ],
//            [
//                'id'    => 13,
//                'title' => 'user_edit',
//            ],
//            [
//                'id'    => 14,
//                'title' => 'user_show',
//            ],
//            [
//                'id'    => 15,
//                'title' => 'user_delete',
//            ],
//            [
//                'id'    => 16,
//                'title' => 'user_access',
//            ],
//            [
//                'id'    => 17,
//                'title' => 'profile_password_edit',
//            ],
//            [
//                'id'    => 18,
//                'title' => 'audit_log_show',
//            ],
//            [
//                'id'    => 19,
//                'title' => 'audit_log_access',
//            ],
//            [
//                'id'    => 20,
//                'title' => 'setting_edit',
//            ],
//            [
//                'id'    => 21,
//                'title' => 'setting_access',
//            ],
//            [
//                'id'    => 22,
//                'title' => 'faculty_create',
//            ],
//            [
//                'id'    => 23,
//                'title' => 'faculty_edit',
//            ],
//            [
//                'id'    => 24,
//                'title' => 'faculty_show',
//            ],
//            [
//                'id'    => 25,
//                'title' => 'faculty_delete',
//            ],
//            [
//                'id'    => 26,
//                'title' => 'faculty_access',
//            ],
//            [
//                'id'    => 27,
//                'title' => 'department_create',
//            ],
//            [
//                'id'    => 28,
//                'title' => 'department_edit',
//            ],
//            [
//                'id'    => 29,
//                'title' => 'department_show',
//            ],
//            [
//                'id'    => 30,
//                'title' => 'department_delete',
//            ],
//            [
//                'id'    => 31,
//                'title' => 'department_access',
//            ],
//
//
//            [
//                'id'    => 32,
//                'title' => 'program_create',
//            ],
//            [
//                'id'    => 33,
//                'title' => 'program_edit',
//            ],
//            [
//                'id'    => 34,
//                'title' => 'program_show',
//            ],
//            [
//                'id'    => 35,
//                'title' => 'program_delete',
//            ],
//            [
//                'id'    => 36,
//                'title' => 'program_access',
//            ],
//            [
//                'id'    => 37,
//                'title' => 'profile_edit',
//            ],
//            [
//                'id'    => 38,
//                'title' => 'semester_access',
//            ],
//            [
//                'id'    => 39,
//                'title' => 'semester_create',
//            ],
//            [
//                'id'    => 40,
//                'title' => 'semester_edit',
//            ],
//            [
//                'id'    => 41,
//                'title' => 'semester_show',
//            ],
//            [
//                'id'    => 42,
//                'title' => 'semester_delete',
//            ],
//            [
//                'id'    => 43,
//                'title' => 'exam_type_create',
//            ],
//            [
//                'id'    => 44,
//                'title' => 'exam_type_edit',
//            ],
//            [
//                'id'    => 45,
//                'title' => 'exam_type_show',
//            ],
//            [
//                'id'    => 46,
//                'title' => 'exam_type_delete',
//            ],
//            [
//                'id'    => 47,
//                'title' => 'exam_type_access',
//            ],

//            [
//                'id'    => 48,
//                'title' => 'assessment_create',
//            ],
//            [
//                'id'    => 49,
//                'title' => 'assessment_edit',
//            ],
//            [
//                'id'    => 50,
//                'title' => 'assessment_show',
//            ],
//            [
//                'id'    => 51,
//                'title' => 'assessment_delete',
//            ],
//            [
//                'id'    => 52,
//                'title' => 'assessment_access',
//            ],
//                        [
//                'id'    => 53,
//                'title' => 'assessment_my_course',
//            ],
            [
                'id'    => 54,
                'title' => 'assessment_list_create',
            ],
            [
                'id'    => 55,
                'title' => 'assessment_list_edit',
            ],
            [
                'id'    => 56,
                'title' => 'assessment_list_show',
            ],
            [
                'id'    => 57,
                'title' => 'assessment_list_delete',
            ],
            [
                'id'    => 58,
                'title' => 'assessment_list_access',
            ],

        ];

        Permission::insert($permissions);
    }
}
