<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogController;

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
    /*$files = array_filter(Storage::disk('phpError')->files('/', true),function ($a) {
        $info = pathinfo($a);
        return ($info['extension']??'') == 'log';
    });

    $url = Storage::url($files[32]);
    dd(\Illuminate\Support\Facades\Config::get('filesystems.disks'));*/
    /*return view('home');
});*/

Route::get('/',[HomeController::class,'home'])->name('home');
Route::get('/logs/{categ?}',[LogController::class,'index'])->name('logIndex');
Route::post('/logsFilter',[LogController::class,'indexFilter'])->name('indexFilter');
