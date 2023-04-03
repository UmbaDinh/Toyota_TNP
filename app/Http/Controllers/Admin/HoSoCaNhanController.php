<?php

namespace App\Http\Controllers\Admin;

use App\Models\NhanVien;
use App\Models\DonVi;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;

class HoSoCaNhanController extends Controller
{
    public function index()
    {
        return view('admin.HoSoCaNhan.hosocanhan', 
        [
            'TTCaNhan' => (new NhanVien())->tt_canhan_nhanvien(Auth::user()->id),
            'TTDonVi' => (new DonVi())->get_all_donvi(),
        ]);
    }

    
}
