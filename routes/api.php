<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Colleges
    Route::apiResource('colleges', 'CollegeApiController');

    // Faculties
    Route::apiResource('faculties', 'FacultyApiController');

    // Levels
    Route::apiResource('levels', 'LevelApiController');

    // Programs
    Route::apiResource('programs', 'ProgramApiController');

    // Subjects
    Route::apiResource('subjects', 'SubjectApiController');

    // Exam Available Days
    Route::apiResource('exam-available-days', 'ExamAvailableDaysApiController');

    // Time Tables
    Route::apiResource('time-tables', 'TimeTableApiController');

    // Academic Years
    Route::apiResource('academic-years', 'AcademicYearApiController');

    // Elective Groups
    Route::apiResource('elective-groups', 'ElectiveGroupApiController');
});
