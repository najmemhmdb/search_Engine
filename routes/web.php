<?php

use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportNews;
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

Route::get('/', function () {
    return view('queryPage');
});
Route::get('/slide/{pic}','QueryController@loadPicture');
Route::post('/result','QueryController@getResult');
//Route::get('/','QueryController@readExcelFile');
//Route::get('import-export', 'QueryController@importExport');
//Route::post('import', 'QueryController@import');