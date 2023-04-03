<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class DiemKPIThang extends Model
{
    use HasFactory;

    protected $table = 'diem_kpithang';
    protected $primaryKey = 'id_diemkpithang  ';
    protected $fillable = [
        'ten_nhanvien',
        'id_donvi',
        'diem_kpi',
        'thang_kpi'
    ];
    
// Code XL Chấm điểm KPI
    //Thêm CT KPI
    public static function postChamDiemThang($id_diemkpithang, $diem_kpi)
    {
        $result = DB::table('diem_kpithang')->where('id_diemkpithang', $id_diemkpithang)->first();
        if ($result) {
            $result = DB::table('diem_kpithang')->where('id_diemkpithang', $id_diemkpithang)->update([
                'diem_kpi' => $result->diem_kpi + $diem_kpi
            ]);
        } else {
            $result = DB::table('diem_kpithang')->insert([
                'id_diemkpithang' => $id_diemkpithang,
                'diem_kpi' => $diem_kpi
            ]);
        }
        return $result;
    }   

//Code XL Xem điểm hiện tại - cá nhân
    public function get_all_diemhientia(){
        $sql = "SELECT * FROM diem_kpithang";
        return DB::select($sql);
    }
}
