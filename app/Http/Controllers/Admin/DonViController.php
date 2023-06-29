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
                            <button type="button" class="btn btn-rounded btn-info btn_capnhat_ct_kpi" data-id="'.$row->id_donvi.'">
                            <span class="btn-icon-start text-info">
                                <i class="fas fa-pencil-alt"></i>
                            </span>Sửa
                            </button>
                            &nbsp;
                            <button type="button" class="btn btn-rounded btn-danger btn_xoa_ct_kpi"
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
        $id_ct_kpi = $request->id_ct_kpi ?? 0;
        $ten_ct_kpi = $request->ten_ct_kpi;
        $diem_ct_kpi = $request->diem_ct_kpi;
        $thang_ct_kpi = $request->thang_ct_kpi;
        $trangthai_ct_kpi = $request->trangthai_ct_kpi;

        $result = ChiTietKPI::postCTKPI($id_ct_kpi, $ten_ct_kpi, $diem_ct_kpi, $thang_ct_kpi, $trangthai_ct_kpi);     
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
}
