<?php

namespace App\Http\Controllers\Admin;

use App\Models\DonVi;
use App\Models\ThongBao;
use App\Models\ViPham;
use App\Models\Diem;
use App\Models\NhanVien;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;


class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.TrangChu.dashboard', 
        [
            'getThongBao' => (new ThongBao())->get_all_thongbao(),
        ]);


        
    }
}