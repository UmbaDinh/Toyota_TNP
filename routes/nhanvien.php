<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NhanVien\DashboardController;
use App\Http\Controllers\NhanVien\DashboardCaNhanController;
use App\Http\Controllers\NhanVien\HoSoCaNhanController;


Route::middleware('auth')->group(function () {
    // các route dành cho người dùng đã đăng nhập
    
Route::group(['prefix' => '/nhanvien'], function() {
    Route::get('/trangchu', [DashboardController::class, 'index'])->name('nhanvien.trangchu');
    Route::get('/trangchucanhan', [DashboardCaNhanController::class, 'index'])->name('nhanvien.trangchucanhan');
    Route::get('/hosocanhan', [HoSoCaNhanController::class, 'index'])->name('nhanvien.hosocanhan');
});
});