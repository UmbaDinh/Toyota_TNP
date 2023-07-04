<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\NhanVien;    
use App\Models\DonVi;    
use App\Http\Controllers\Controller;

class DonViController extends Controller
{
    public function index(Request $request)
    {
        $data = DonVi::get_all_donvi();
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('hoat_dong', function($hoat_dong) {
                    return $hoat_dong->hoat_dong ==  1 ? '<span class="badge light badge-success">Hoạt động</span>' : '<span class="badge light badge-danger">Ngừng hoạt động</span>';
                })
                ->addColumn('actions', function ($row) {
                    $action = '
                            <button type="button" class="btn btn-rounded btn-info btn_capnhat_donvi" data-id="'.$row->id_donvi.'">
                            <span class="btn-icon-start text-info">
                                <i class="fas fa-pencil-alt"></i>
                            </span>Sửa
                            </button>
                            &nbsp;
                            <button type="button" class="btn btn-rounded btn-danger btn_xoa_donvi"
                                data-id="'.$row->id_donvi.'">
                                <span class="btn-icon-start text-danger">
                                    <i class="fa fa-trash"></i>
                                </span>Xóa
                            </button>'
                               ;
                    return $action;
                })
                ->rawColumns(['actions', 'hoat_dong'])
                ->make(true);
        }
        return view('admin.DonVi.donvi');
    }

// Thêm dữ liệu    
    public function postDonVi(Request $request){
        $id_donvi = $request->id_donvi ?? 0;
        $ten_dv = $request->ten_dv;
        $ma_dv = $request->ma_dv;
        $hoat_dong = $request->hoat_dong;
        $hd = 1;
        if($hoat_dong == "on"){
            $hd = 1;
        }else{
            $hd = 0;
        }
        $result = DonVi::postDonVi($id_donvi, $ten_dv, $ma_dv, $hd);     
        if ($result) {
            return response()->json([
                'message' => 'Thao tác thành công',
                'data' => $result
            ], 200);
        } else {
            return response()->json([
                'message' => 'Thao tác thất bại',
                'data' => $result
            ], 400);
        }
    }

// Xóa dữ liệu
    public function deleteDonVi(Request $request)
    {
        $id_donvi = $request->id_donvi;
        $result = DonVi::deleteDonVi($id_donvi);
        if ($result) {
            return response()->json([
                'message' => 'Thao tác thành công'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Thao tác thất bại'
            ], 400);
        }
    }
}
