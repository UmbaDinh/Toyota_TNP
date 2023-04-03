<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

use App\Models\ChiTietKPI;    
use App\Models\ToolsModel;
class ChiTietKPIController extends Controller
{
// Hiển thị dữ liệu    
    public function index(Request $request)
    {
        $data = ChiTietKPI::get_all_chitietkpi();
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('trangthai_ct_kpi', function($trangthai_ct_kpi) {
                    return $trangthai_ct_kpi->trangthai_ct_kpi ==  "on" ? '<span class="badge light badge-success">Hoạt động</span>' : '<span class="badge light badge-danger">Ngừng hoạt động</span>';
                })
                ->addColumn('actions', function ($row) {
                    $action = '
                            <button type="button" class="btn btn-rounded btn-info btn_capnhat_ct_kpi" data-id="'.$row->id_ct_kpi.'">
                            <span class="btn-icon-start text-info">
                                <i class="fas fa-pencil-alt"></i>
                            </span>Sửa
                            </button>
                            &nbsp;
                            <button type="button" class="btn btn-rounded btn-danger btn_xoa_ct_kpi"
                                data-id="'.$row->id_ct_kpi.'">
                                <span class="btn-icon-start text-danger">
                                    <i class="fa fa-trash"></i>
                                </span>Xóa
                            </button>'
                               ;
                    return $action;
                })
                ->rawColumns(['actions', 'trangthai_ct_kpi'])
                ->make(true);
        }
        return view('admin.ChiTietKPI.chitietkpi');
    }

// Thêm dữ liệu    
    public function postCTKPI(Request $request){
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

// Xóa dữ liệu
    public function deleteCTKPI(Request $request)
    {
        $id_ct_kpi = $request->id_ct_kpi;
        $result = ChiTietKPI::deleteCTKPI($id_ct_kpi);
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
