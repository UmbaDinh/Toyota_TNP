<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class ThongBao extends Model
{
    use HasFactory;

    protected $table = 'thong_bao';
    protected $primaryKey = 'id_thongbao';
    protected $fillable = [
        'ten_thong_bao',
        'file_dinh_kem',
        'trangthai',
        'ngay_dang_thong_bao'
    ];

//XL Thông báo
    public function get_all_thongbao(){
        $sql = "SELECT * FROM thongbao";
        return DB::select($sql);
    }
    
}
