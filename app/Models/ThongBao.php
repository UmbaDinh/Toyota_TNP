<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class ThongBao extends Model
{
    use HasFactory;

    protected $table = 'thongbao';
    protected $primaryKey = 'ID_THONGBAO';
    protected $fillable = [
        'TIEUDE_THONGBAO',
        'NOIDUNG_THONGBAO',
        'upload_file',
    ];

//XL Thông báo
    public function get_all_thongbao(){
        $sql = "SELECT * FROM thongbao";
        return DB::select($sql);
    }

//Thêm Thoong báo
    public static function postThongBao($id_thongbao, $tieude_thongbao, $noidung_thongbao, $upload_file)
    {
        $result = DB::table('thongbao')->updateOrInsert([
            'ID_THONGBAO' => $id_thongbao
        ], [
            'TIEUDE_THONGBAO' => $tieude_thongbao,
            'NOIDUNG_THONGBAO' => $noidung_thongbao,
            'upload_file' => $upload_file,
        ]);
        return $result;
    } 

        // Xóa CT KPI
    public static function deleteThongBao($id_thongbao)
    {
        $result = DB::table('thongbao')->where([
            'ID_THONGBAO' => $id_thongbao
        ])->delete();
        return $result;
    }    
}
