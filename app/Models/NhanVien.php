<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class NhanVien extends Model
{
    use HasFactory;

    protected $table = 'nhanvien';
    protected $primaryKey = 'id_nhanvien';
    protected $fillable = [
        'ho_ten',
        'gioi_tinh',
        'so_dien_thoai',
        'ngay_sinh',
        'chuc_vu',
        'cmnd',
        'ngay_cap',
        'noi_cap',
        'dia_chi_thuong_tru',
        'ngay_nhan_viec',
        'hinh_anh'
    ];
//XL QL Nhân Viên
    public function get_all_nhanvien(){
        $sql = "SELECT * FROM nhanvien";
        return DB::select($sql);
    }
//XL Hồ sơ cá nhân
    public function tt_canhan_nhanvien($id_nhanvien)
    {
        $sql = "SELECT * FROM nhanvien WHERE nhanvien.id_dangnhap = $id_nhanvien";
        return DB::select($sql);
    }
}
