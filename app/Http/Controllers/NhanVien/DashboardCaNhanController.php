<?php

namespace App\Http\Controllers\NhanVien;

use App\Models\DonVi;
use App\Models\ThongBao;
use App\Models\ViPham;
use App\Models\Diem;
use App\Models\DiemKPIThang;
use App\Models\NhanVien;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardCaNhanController extends Controller
{
    public function index()
    {
        return view('nhanvien.TrangChuCaNhan.dashboard_canhan', 
        [
            'DiemKPIThang' => (new DiemKPIThang())->get_all_diemhientia(),
            'TTDonVi' => (new DonVi())->get_all_donvi(),
            'TTCaNhan' => (new NhanVien())->tt_canhan_nhanvien(Auth::user()->id),
            'TT_Log_CaNhan' => (new LogChamDiem())->log_canhan(Auth::user()->id),
        ]);
        
    }
}
