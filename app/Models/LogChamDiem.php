<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class LogChamDiem extends Model
{
    use HasFactory;

    protected $table = 'log_chamdiemkpi';
    protected $primaryKey = 'id_logchamdiem  ';
    protected $fillable = [
        'id_nhanvien',
        'chitiet_kpi',
        'diem',
        'lydo',
        'hinhanh'
    ];
    
// Code XL Chấm điểm KPI
    public static function postLogChamDiem($id_nhanvien, $chitiet_kpi, $diem, $lydo, $hinhanh)
    {
        $result = DB::table('log_chamdiemkpi')->insert([
            'id_nhanvien' => $id_nhanvien,
            'chitiet_kpi' => $chitiet_kpi,
            'diem' => $diem,
            'lydo' => $lydo,
            'hinhanh' => $hinhanh
        ]);
        return $result;
    } 
    public function log_canhan($id_nhanvien)
    {
        $sql = "SELECT * FROM log_chamdiemkpi WHERE log_chamdiemkpi.id_nhanvien = $id_nhanvien";
        return DB::select($sql);
    }
    

}
