<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class ChamDiemKPI extends Model
{
    use HasFactory;

    protected $table = 'chi_tiet_kpi';
    protected $primaryKey = 'id_ct_kpi ';
    protected $fillable = [
        'ten_ct_kpi',
        'diem_ct_kpi',
        'thang_ct_kpi',
        'trangthai_ct_kpi'
    ];
    
// Code XL Chi tiết KPI
    public static function get_all_nhanvien(){
        $sql = "SELECT * FROM nhanvien";
        return DB::select($sql);
    }

    public static function get_nhanvien_theodonvi($id_donvi){
        $sql = "SELECT * FROM nhanvien WHERE id_donvi = $id_donvi";
        return DB::select($sql);
    }
}
