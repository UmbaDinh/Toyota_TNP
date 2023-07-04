<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class DonVi extends Model
{
    use HasFactory;

    protected $table = 'don_vi';
    protected $primaryKey = 'id_donvi';
    protected $fillable = [
        'ma_dv',
        'ten_dv',
        'hoat_dong'
    ];
// Code NhanVien    
    public function get_all_donvi(){
        $sql = "SELECT * FROM don_vi";
        return DB::select($sql);
    }

//Them don vi
    public static function postDonVi($id_donvi, $ten_dv, $ma_dv, $hoat_dong)   
    {
        $result = DB::table('don_vi')->updateOrInsert([
            'id_donvi' => $id_donvi
        ], [
            'ten_dv' => $ten_dv,
            'ma_dv' => $ma_dv,
            'hoat_dong' => $hoat_dong
        ]);
        return $result;
    } 

// Xóa CT KPI
    public static function deleteDonVi($id_donvi)
    {
        $result = DB::table('don_vi')->where([
            'id_donvi' => $id_donvi
        ])->delete();
        return $result;
    }    
    
}
