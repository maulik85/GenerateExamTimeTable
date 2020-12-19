<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'exam_access',
            ],
            [
                'id'    => 18,
                'title' => 'college_create',
            ],
            [
                'id'    => 19,
                'title' => 'college_edit',
            ],
            [
                'id'    => 20,
                'title' => 'college_show',
            ],
            [
                'id'    => 21,
                'title' => 'college_delete',
            ],
            [
                'id'    => 22,
                'title' => 'college_access',
            ],
            [
                'id'    => 23,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 24,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 25,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 26,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 27,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 28,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 29,
                'title' => 'faculty_create',
            ],
            [
                'id'    => 30,
                'title' => 'faculty_edit',
            ],
            [
                'id'    => 31,
                'title' => 'faculty_show',
            ],
            [
                'id'    => 32,
                'title' => 'faculty_delete',
            ],
            [
                'id'    => 33,
                'title' => 'faculty_access',
            ],
            [
                'id'    => 34,
                'title' => 'level_create',
            ],
            [
                'id'    => 35,
                'title' => 'level_edit',
            ],
            [
                'id'    => 36,
                'title' => 'level_show',
            ],
            [
                'id'    => 37,
                'title' => 'level_delete',
            ],
            [
                'id'    => 38,
                'title' => 'level_access',
            ],
            [
                'id'    => 39,
                'title' => 'program_create',
            ],
            [
                'id'    => 40,
                'title' => 'program_edit',
            ],
            [
                'id'    => 41,
                'title' => 'program_show',
            ],
            [
                'id'    => 42,
                'title' => 'program_delete',
            ],
            [
                'id'    => 43,
                'title' => 'program_access',
            ],
            [
                'id'    => 44,
                'title' => 'subject_create',
            ],
            [
                'id'    => 45,
                'title' => 'subject_edit',
            ],
            [
                'id'    => 46,
                'title' => 'subject_show',
            ],
            [
                'id'    => 47,
                'title' => 'subject_delete',
            ],
            [
                'id'    => 48,
                'title' => 'subject_access',
            ],
            [
                'id'    => 49,
                'title' => 'exam_available_day_create',
            ],
            [
                'id'    => 50,
                'title' => 'exam_available_day_edit',
            ],
            [
                'id'    => 51,
                'title' => 'exam_available_day_show',
            ],
            [
                'id'    => 52,
                'title' => 'exam_available_day_delete',
            ],
            [
                'id'    => 53,
                'title' => 'exam_available_day_access',
            ],
            [
                'id'    => 54,
                'title' => 'time_table_create',
            ],
            [
                'id'    => 55,
                'title' => 'time_table_edit',
            ],
            [
                'id'    => 56,
                'title' => 'time_table_show',
            ],
            [
                'id'    => 57,
                'title' => 'time_table_delete',
            ],
            [
                'id'    => 58,
                'title' => 'time_table_access',
            ],
            [
                'id'    => 59,
                'title' => 'academic_year_create',
            ],
            [
                'id'    => 60,
                'title' => 'academic_year_edit',
            ],
            [
                'id'    => 61,
                'title' => 'academic_year_show',
            ],
            [
                'id'    => 62,
                'title' => 'academic_year_delete',
            ],
            [
                'id'    => 63,
                'title' => 'academic_year_access',
            ],
            [
                'id'    => 64,
                'title' => 'elective_group_create',
            ],
            [
                'id'    => 65,
                'title' => 'elective_group_edit',
            ],
            [
                'id'    => 66,
                'title' => 'elective_group_show',
            ],
            [
                'id'    => 67,
                'title' => 'elective_group_delete',
            ],
            [
                'id'    => 68,
                'title' => 'elective_group_access',
            ],
            [
                'id'    => 69,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
