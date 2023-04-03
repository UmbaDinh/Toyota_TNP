<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\NhanVienController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DashboardCaNhanController;
use App\Http\Controllers\Admin\HoSoCaNhanController;
use App\Http\Controllers\Admin\ChiTietKPIController;
use App\Http\Controllers\Admin\ChamDiemKPIController;


Route::prefix('admin')->middleware('auth', 'isAdmin')->group(function(){
    Route::get('/trangchu', [DashboardController::class, 'index'])->name('admin.trangchu');
    Route::get('/trangchucanhan', [DashboardCaNhanController::class, 'index'])->name('admin.trangchucanhan');
    Route::get('/hosocanhan', [HoSoCaNhanController::class, 'index'])->name('admin.hosocanhan');
    Route::get('/nhanvien', [NhanVienController::class, 'index'])->name('admin.nhanvien');
//Code QL nhan vien
    Route::get('/fetch-nhanvien', [NhanVienController::class, 'fetchnhanvien']);


//Code QL KPI
Route::group(['prefix' => '/ct-kpi'], function() {
    Route::get('/', [ChiTietKPIController::class, 'index'])->name('admin.chitietkpi');
    Route::post('/', [ChiTietKPIController::class, 'postCTKPI']);
    Route::delete('/', [ChiTietKPIController::class, 'deleteCTKPI']);
});

// Code QL Chấm điểm KPI
Route::group(['prefix' => '/chamdiem-kpi'], function() {
    Route::get('/', [ChamDiemKPIController::class, 'index'])->name('admin.chamdiemkpi');
    Route::get('/{id_donvi}', [ChamDiemKPIController::class, 'loadnv_theodonvi']);
    Route::post('/', [ChamDiemKPIController::class, 'postChamDiemKPI']);

    // Route::post('/', [ChiTietKPIController::class, 'postCTKPI']);
    // Route::delete('/', [ChiTietKPIController::class, 'deleteCTKPI']);
});

});