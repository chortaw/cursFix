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
//Route::get('/', function () {
//    return view('/welcome');
//});
Route::get('/','CarListController@index2');

//////////////////////////////////////////////////////////////

Route::get('/users/{id}/edit','UserController@edit');
Route::get('users/destroy/{id}','UserController@destroy');

Route::get('/users','UserController@getAll')
    ->name('datatables.userdata');

//////////////////////////////////////////////////////////////

Route::get('/roomtasks','RoomTaskController@index');
Route::get('/roomtasks/create','RoomTaskController@create');

Route::get('/roomtasks/{roomtasks}','RoomTaskController@show');
Route::post('/roomtasks/create','RoomTaskController@store');


Route::put('/roomtasks/{id}/edit','RoomTaskController@update');
Route::get('/roomtasks/{id}/edit','RoomTaskController@edit');
Route::get('/roomtasks/destroy/{id}','RoomTaskController@destroy');

////////////////////////////////////////////////////////////////
Route::get('/roomlist','RoomListController@index');

Route::get('/roomlist/create','RoomListController@create');
Route::get('/roomlist/{roomlist}','RoomListController@show');

Route::post('/roomlist','RoomListController@store');

Route::put('/roomlist/{id}/edit','RoomListController@update');

Route::get('/roomlist/{id}/edit','RoomListController@edit');


////////////////////////////////////////////////////////////////
Auth::routes();

Route::get('/home', 'HomeController@index');
////////////////////////////////////////////////////////////////


Route::get('datatables', 'DatatablesController@getIndex')
    ->name('datatables');
Route::get('datatables.data', 'DatatablesController@anyData')
    ->name('datatables.data');


Route::get('datatables/togglestatus/{id}', 'DatatablesController@ToggleStatus');

Route::get('datatables/show', 'DatatablesController@getId');

Route::get('datatables/showsaha', 'DatatablesController@getId'); //สหสาขาวิชา

Route::get('datatables/showdriver', 'DatatablesController@getIndex');   //เจ้าหน้าขับรถ

Route::get('datatables/showeq', 'DatatablesController@getIndex');   //เจ้าหน้าที่โสต



Route::get('datatables.byid', 'DatatablesController@getbyId')
    ->name('datatables.byid');




///////////////////////////////////////////////////


Route::get('/cartask', 'CarTaskController@getCarTask')
    ->name('datatables.cardata');
Route::get('/cartaskid', 'CarTaskController@getbyId')
    ->name('datatables.carIddata');



Route::post('/cartasks/create','CarTaskController@store');
Route::get('cartasks/togglestatus/{id}', 'CarTaskController@ToggleStatus');
Route::get('cartasks/destroy/{id}','CarTaskController@destroy');

////////////////////////////////////////////////////////////////////////////
Route::get('/alllists','CarListController@index');
Route::post('/alllists/create','CarListController@store');



////////////////////////////////////////////////////////////////////////////
Route::get('/cameratask','CameraTaskController@GetAllTask')
    ->name('datatables.cameradata');

Route::post('cameratask/create', 'CameraTaskController@store');
Route::get('cameratask/destroy/{id}','CameraTaskController@destroy');
Route::get('cameratask/togglestatus/{id}', 'CameraTaskController@ToggleStatus');

//////////////////////////////////////////////////////////////////////////////


Route::get('calendar', function () {
        return view('/calendar');
    });
Route::get('/calendarroomdata', 'CalendarController@getRoomArraySQL');

Route::get('/calendarcardata', 'CalendarController@getCarArraySQL');

Route::get('/calendarcameradata', 'CalendarController@getCameraArraySQL');











