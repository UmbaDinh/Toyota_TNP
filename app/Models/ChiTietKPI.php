<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class ChiTietKPI extends Model
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
    public static function get_all_chitietkpi(){
        $sql = "SELECT * FROM chi_tiet_kpi";
        return DB::select($sql);
    }

    //Thêm CT KPI
    public static function postCTKPI($id_ct_kpi, $ten_ct_kpi, $diem_ct_kpi, $thang_ct_kpi, $trangthai_ct_kpi)
    {
        $result = DB::table('chi_tiet_kpi')->updateOrInsert([
            'id_ct_kpi' => $id_ct_kpi
        ], [
            'ten_ct_kpi' => $ten_ct_kpi,
            'diem_ct_kpi' => $diem_ct_kpi,
            'thang_ct_kpi' => $thang_ct_kpi,
            'trangthai_ct_kpi' => $trangthai_ct_kpi
        ]);
        return $result;
    } 

    // Xóa CT KPI
    public static function deleteCTKPI($id_ct_kpi)
    {
        $result = DB::table('chi_tiet_kpi')->where([
            'id_ct_kpi' => $id_ct_kpi
        ])->delete();
        return $result;
    }    

//Code XL Chấm điểm KPI
    public static function get_all_ct_kpi(){
        $sql = "SELECT * FROM chi_tiet_kpi";
        return DB::select($sql);
    }
}
