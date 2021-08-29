<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('mymodule', function () {
    return 'ok';
});
Route::group(
    ['prefix' => 'client', 'as' => 'client.', 'middleware' => ['role:client']],
    function () {
        Route::get('client_dashboard', function () {
            redirect()->to(route('client.dashboard.index'));
        })->name('dashboard');

        Route::group(
            ['prefix' => 'employees'],
            function () {
                Route::resource('teams', 'ManageTeamsController');
                Route::resource('employees', 'ManageEmployeesController');
                Route::resource('designations', 'ManageDesignationController');
                Route::get('attendances/summary', ['uses' => 'ManageAttendanceController@summary'])->name('attendances.summary');
                Route::post('attendances/summaryData', ['uses' => 'ManageAttendanceController@summaryData'])->name('attendances.summaryData');
                Route::resource('holidays', 'HolidaysController');
                Route::get('holidays/view-holiday/{year?}', 'HolidaysController@viewHoliday')->name('holidays.view-holiday');
                Route::get('leaves/pending', ['as' => 'leaves.pending', 'uses' => 'ManageLeavesController@pendingLeaves']);

                Route::get('employees/free-employees', ['uses' => 'ManageEmployeesController@freeEmployees'])->name('employees.freeEmployees');
                Route::post('employees/assignRole', ['uses' => 'ManageEmployeesController@assignRole'])->name('employees.assignRole');
                Route::get('employees/export/{status?}/{employee?}/{role?}', ['uses' => 'ManageEmployeesController@export'])->name('employees.export');
                Route::get('employees/export', ['uses' => 'MemberEmployeesController@export'])->name('employees.export');
                Route::resource('attendances', 'ManageAttendanceController');
                Route::get('attendances/attendance-by-date', ['uses' => 'ManageAttendanceController@attendanceByDate'])->name('attendances.attendanceByDate');
                Route::get('attendances/info/{id}', ['uses' => 'ManageAttendanceController@detail'])->name('attendances.info');
                Route::get('attendances/mark/{id}/{day}/{month}/{year}', ['uses' => 'ManageAttendanceController@mark'])->name('attendances.mark');
                Route::get('attendances/bulk', ['uses' => 'ManageAttendanceController@bulkAttendance'])->name('attendances.bulk');
                Route::get('holidays/mark-holiday', 'HolidaysController@markHoliday')->name('holidays.mark-holiday');
                Route::get('holidays/calendar-month', 'HolidaysController@getCalendarMonth')->name('holidays.calendar-month');
                Route::get('holidays/calendar/{year?}', 'HolidaysController@holidayCalendar')->name('holidays.calendar');
                Route::resource('leaves', 'ManageLeavesController');
                Route::get('leaves/show-reject-modal', ['as' => 'leaves.show-reject-modal', 'uses' => 'ManageLeavesController@rejectModal']);
                Route::post('leaves/leaveAction', ['as' => 'leaves.leaveAction', 'uses' => 'ManageLeavesController@leaveAction']);
                Route::get('leave/all-leaves', ['uses' => 'ManageLeavesController@allLeave'])->name('leave.all-leaves');
            }
        );
    }
);
