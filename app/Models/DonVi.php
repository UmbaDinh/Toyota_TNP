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

//code HsCaNhan

}
