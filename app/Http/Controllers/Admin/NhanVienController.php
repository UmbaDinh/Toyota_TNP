<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\NhanVien;    
use App\Models\DonVi;    
use App\Http\Controllers\Controller;

class NhanVienController extends Controller
{

// Hiển thị dữ liệu    
    public function index(Request $request)
    {
        $data = NhanVien::get_all_nhanvien();
        $data2 = DonVi::get_all_donvi();
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('trangthai_nhanvien', function($trangthai_nhanvien) {
                    return $trangthai_nhanvien->trangthai_nhanvien ==  1 ? '<span class="badge light badge-success">Còn làm</span>' : '<span class="badge light badge-danger">Đã nghỉ làm</span>';
                })
                ->addColumn('ten_donvi', function ($row) use ($data2) {
                    // Lấy thông tin tên đơn vị từ $data2 dựa trên id_donvi của $row
                    $ten_donvi = $data2->where('id_donvi', $row->id_donvi)->first()->ten_donvi; 
                    // Kiểm tra nếu không tìm thấy đơn vị, trả về một giá trị mặc định
                    if (empty($ten_donvi)) {
                        $ten_donvi = 'Đơn vị không tồn tại';
                    }
                    return $ten_donvi;
                })
                ->addColumn('actions', function ($row) {
                    $action = '
                            <button type="button" class="btn btn-rounded btn-info btn_capnhat_ct_kpi" data-id="'.$row->id_nhanvien.'">
                            <span class="btn-icon-start text-info">
                                <i class="fas fa-pencil-alt"></i>
                            </span>Sửa
                            </button>
                            &nbsp;
                            <button type="button" class="btn btn-rounded btn-danger btn_xoa_ct_kpi"
                                data-id="'.$row->id_nhanvien.'">
                                <span class="btn-icon-start text-danger">
                                    <i class="fa fa-trash"></i>
                                </span>Xóa
                            </button>'
                               ;
                    return $action;
                })
                ->rawColumns(['actions', 'trangthai_nhanvien', 'ten_donvi'])
                ->make(true);
        }
        return view('admin.NhanVien.nhanvien');
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
