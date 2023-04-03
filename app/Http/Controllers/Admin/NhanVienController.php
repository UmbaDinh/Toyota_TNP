<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\NhanVien;    
use App\Models\DonVi;    
use App\Http\Controllers\Controller;

class NhanVienController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.NhanVien.nhanvien', 
        [
            'NhanVien' => (new NhanVien())->get_all_nhanvien(),
            'DonVi' => (new DonVi())->get_all_donvi(),
        ]);
    }
}
