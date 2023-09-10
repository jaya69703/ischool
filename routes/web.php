<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\Setting\MenuController;
use App\Http\Controllers\Setting\UserController;
use App\Http\Controllers\Pages\UserManageController;
use App\Http\Controllers\Pages\PositionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('home.index');
})->name('root.index');

Route::get('/errors-verify', function () {
    $data['title'] = "iSchool";
    $data['menu'] = "Error";
    $data['submenu'] = "Error Verify";

    return view('pages.errors.errors-verify',$data);
})->name('errors.verify');

Route::get('/errors-access', function () {
    $data['title'] = "iSchool";
    $data['menu'] = "Error";
    $data['submenu'] = "Error Access";

    return view('pages.errors.errors-access', $data);
})->name('errors.access');





Route::middleware(['auth', 'user-access:Siswa', 'isverify:1'])->group(function () {
  
    // Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/siswa/home', [GuestController::class, 'index'])->name('home.index');
    
});

Route::middleware(['auth', 'user-access:Staff', 'isverify:1'])->group(function () {
    Route::get('/staff/home', [GuestController::class, 'index'])->name('staff.home.index');
    // USER PROFILE
    Route::get('/admin/profile', [UserController::class, 'index'])->name('profile.index');
    Route::post('/admin/profile/store', [UserController::class, 'store'])->name('profile.store');
    Route::patch('/admin/profile/update/{id}', [UserController::class, 'update'])->name('profile.update');
    Route::delete('/admin/profile/delete/{id}', [UserController::class, 'destroy'])->name('profile.destroy');
    // MENU MANAGEMENT
    Route::get('/admin/menu', [MenuController::class, 'index'])->name('menu.index');
    Route::post('/admin/menu/store', [MenuController::class, 'store'])->name('menu.store');
    Route::patch('/admin/menu/update/{id}', [MenuController::class, 'update'])->name('menu.update');
    Route::delete('/admin/menu/delete/{id}', [MenuController::class, 'destroy'])->name('menu.destroy');
    // USER MANAGEMENT
    Route::get('/admin/usermanage/staff', [UserManageController::class, 'index'])->name('usermanage.staff');
    Route::post('/admin/usermanage/staff/store', [UserManageController::class, 'store'])->name('usermanage.staff.store');
    Route::get('/admin/usermanage/staff/edit/{id}', [UserManageController::class, 'edit'])->name('usermanage.staff.edit');
    Route::patch('/admin/usermanage/staff/update/{id}', [UserManageController::class, 'update'])->name('usermanage.staff.update');
    Route::delete('/admin/usermanage/staff/delete/{id}', [UserManageController::class, 'destroy'])->name('usermanage.staff.destroy');
    Route::get('/admin/usermanage/position', [PositionController::class, 'index'])->name('usermanage.position');
    Route::post('/admin/usermanage/position/store', [PositionController::class, 'store'])->name('usermanage.position.store');
    Route::patch('/admin/usermanage/position/update/{id}', [PositionController::class, 'update'])->name('usermanage.position.update');
    Route::delete('/admin/usermanage/position/delete/{id}', [PositionController::class, 'destroy'])->name('usermanage.position.destroy');
    
});

require __DIR__.'/auth.php';
