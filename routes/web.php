<?php

Route::view('/', 'welcome');
Route::get('userVerification/{token}', 'UserVerificationController@approve')->name('userVerification');
Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Colleges
    Route::delete('colleges/destroy', 'CollegeController@massDestroy')->name('colleges.massDestroy');
    Route::post('colleges/parse-csv-import', 'CollegeController@parseCsvImport')->name('colleges.parseCsvImport');
    Route::post('colleges/process-csv-import', 'CollegeController@processCsvImport')->name('colleges.processCsvImport');
    Route::resource('colleges', 'CollegeController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // Faculties
    Route::delete('faculties/destroy', 'FacultyController@massDestroy')->name('faculties.massDestroy');
    Route::resource('faculties', 'FacultyController');

    // Levels
    Route::delete('levels/destroy', 'LevelController@massDestroy')->name('levels.massDestroy');
    Route::resource('levels', 'LevelController');

    // Programs
    Route::delete('programs/destroy', 'ProgramController@massDestroy')->name('programs.massDestroy');
    Route::post('programs/parse-csv-import', 'ProgramController@parseCsvImport')->name('programs.parseCsvImport');
    Route::post('programs/process-csv-import', 'ProgramController@processCsvImport')->name('programs.processCsvImport');
    Route::resource('programs', 'ProgramController');

    // Subjects
    Route::delete('subjects/destroy', 'SubjectController@massDestroy')->name('subjects.massDestroy');
    Route::post('subjects/parse-csv-import', 'SubjectController@parseCsvImport')->name('subjects.parseCsvImport');
    Route::post('subjects/process-csv-import', 'SubjectController@processCsvImport')->name('subjects.processCsvImport');
    Route::resource('subjects', 'SubjectController');

    // Exam Available Days
    Route::delete('exam-available-days/destroy', 'ExamAvailableDaysController@massDestroy')->name('exam-available-days.massDestroy');
    Route::post('exam-available-days/parse-csv-import', 'ExamAvailableDaysController@parseCsvImport')->name('exam-available-days.parseCsvImport');
    Route::post('exam-available-days/process-csv-import', 'ExamAvailableDaysController@processCsvImport')->name('exam-available-days.processCsvImport');
    Route::resource('exam-available-days', 'ExamAvailableDaysController');

    // Time Tables
    Route::delete('time-tables/destroy', 'TimeTableController@massDestroy')->name('time-tables.massDestroy');
    Route::post('time-tables/parse-csv-import', 'TimeTableController@parseCsvImport')->name('time-tables.parseCsvImport');
    Route::post('time-tables/process-csv-import', 'TimeTableController@processCsvImport')->name('time-tables.processCsvImport');
    Route::resource('time-tables', 'TimeTableController');

    // Academic Years
    Route::delete('academic-years/destroy', 'AcademicYearController@massDestroy')->name('academic-years.massDestroy');
    Route::post('academic-years/parse-csv-import', 'AcademicYearController@parseCsvImport')->name('academic-years.parseCsvImport');
    Route::post('academic-years/process-csv-import', 'AcademicYearController@processCsvImport')->name('academic-years.processCsvImport');
    Route::resource('academic-years', 'AcademicYearController');

    // Elective Groups
    Route::delete('elective-groups/destroy', 'ElectiveGroupController@massDestroy')->name('elective-groups.massDestroy');
    Route::post('elective-groups/parse-csv-import', 'ElectiveGroupController@parseCsvImport')->name('elective-groups.parseCsvImport');
    Route::post('elective-groups/process-csv-import', 'ElectiveGroupController@processCsvImport')->name('elective-groups.processCsvImport');
    Route::resource('elective-groups', 'ElectiveGroupController');

    Route::get('system-calendar', 'SystemCalendarController@index')->name('systemCalendar');
    Route::get('messenger', 'MessengerController@index')->name('messenger.index');
    Route::get('messenger/create', 'MessengerController@createTopic')->name('messenger.createTopic');
    Route::post('messenger', 'MessengerController@storeTopic')->name('messenger.storeTopic');
    Route::get('messenger/inbox', 'MessengerController@showInbox')->name('messenger.showInbox');
    Route::get('messenger/outbox', 'MessengerController@showOutbox')->name('messenger.showOutbox');
    Route::get('messenger/{topic}', 'MessengerController@showMessages')->name('messenger.showMessages');
    Route::delete('messenger/{topic}', 'MessengerController@destroyTopic')->name('messenger.destroyTopic');
    Route::post('messenger/{topic}/reply', 'MessengerController@replyToTopic')->name('messenger.reply');
    Route::get('messenger/{topic}/reply', 'MessengerController@showReply')->name('messenger.showReply');
    Route::get('user-alerts/read', 'UserAlertsController@read');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
// Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
Route::group(['as' => 'frontend.', 'namespace' => 'Frontend', 'middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Colleges
    Route::delete('colleges/destroy', 'CollegeController@massDestroy')->name('colleges.massDestroy');
    Route::resource('colleges', 'CollegeController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // Faculties
    Route::delete('faculties/destroy', 'FacultyController@massDestroy')->name('faculties.massDestroy');
    Route::resource('faculties', 'FacultyController');

    // Levels
    Route::delete('levels/destroy', 'LevelController@massDestroy')->name('levels.massDestroy');
    Route::resource('levels', 'LevelController');

    // Programs
    Route::delete('programs/destroy', 'ProgramController@massDestroy')->name('programs.massDestroy');
    Route::resource('programs', 'ProgramController');

    // Subjects
    Route::delete('subjects/destroy', 'SubjectController@massDestroy')->name('subjects.massDestroy');
    Route::resource('subjects', 'SubjectController');

    // Exam Available Days
    Route::delete('exam-available-days/destroy', 'ExamAvailableDaysController@massDestroy')->name('exam-available-days.massDestroy');
    Route::resource('exam-available-days', 'ExamAvailableDaysController');

    // Time Tables
    Route::delete('time-tables/destroy', 'TimeTableController@massDestroy')->name('time-tables.massDestroy');
    Route::resource('time-tables', 'TimeTableController');

    // Academic Years
    Route::delete('academic-years/destroy', 'AcademicYearController@massDestroy')->name('academic-years.massDestroy');
    Route::resource('academic-years', 'AcademicYearController');

    // Elective Groups
    Route::delete('elective-groups/destroy', 'ElectiveGroupController@massDestroy')->name('elective-groups.massDestroy');
    Route::resource('elective-groups', 'ElectiveGroupController');

    Route::get('frontend/profile', 'ProfileController@index')->name('profile.index');
    Route::post('frontend/profile', 'ProfileController@update')->name('profile.update');
    Route::post('frontend/profile/destroy', 'ProfileController@destroy')->name('profile.destroy');
    Route::post('frontend/profile/password', 'ProfileController@password')->name('profile.password');
});
