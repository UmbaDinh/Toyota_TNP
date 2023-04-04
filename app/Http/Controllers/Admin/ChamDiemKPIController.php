<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\NhanVien;    
use App\Models\ChiTietKPI;    
use App\Models\ChamDiemKPI;    
use App\Models\DonVi;    
use App\Models\DiemKPIThang;    
use App\Models\LogChamDiem;    
use App\Http\Controllers\Controller;

class ChamDiemKPIController extends Controller
{
// Hiển thị dữ liệu 
    public function index(Request $request)
    {
        $data = ChamDiemKPI::get_all_nhanvien();
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('actions', function ($row) {
                    $action = '
                    <button type="button" class="btn btn-success btn_load_dl" data-id="'.$row->id_nhanvien.'">Lấy DL 
                        <span class="btn-icon-end">
                            <i class="fa fa-check"></i>
                        </span>
                    </button>'
                               ;
                    return $action;
                })
                ->rawColumns(['actions'])
                ->make(true);
        }
        return view('admin.ChamDiemKPI.chamdiemkpi' , 
        [
            'DonVi' => (new DonVi())->get_all_donvi(),
            'CT_KPI' => (new ChiTietKPI())->get_all_ct_kpi(),
        ]);
    }

    public function loadnv_theodonvi(Request $request, $id_donvi)
    {
        $data = ChamDiemKPI::get_nhanvien_theodonvi($id_donvi);
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('actions', function ($row) {
                    $action = '
                    <button type="button" class="btn btn-success btn_load_dl" data-id="'.$row->id_nhanvien.'">Lấy DL 
                        <span class="btn-icon-end">
                            <i class="fa fa-check"></i>
                        </span>
                    </button>'
                               ;
                    return $action;
                })
                ->rawColumns(['actions'])
                ->make(true);
        }
        return view('admin.ChamDiemKPI.chamdiemkpi' , 
        [
            'DonVi' => (new DonVi())->get_all_donvi(),
            'CT_KPI' => (new ChiTietKPI())->get_all_ct_kpi(),
        ]);
    }
    
//Chấm điểm 
    public function postChamDiemKPI(Request $request){
        $id_diemkpithang = $request->id_chamdiem;
        $diem_kpi = $request->diem_cong_tru;

        $id_nhanvien = $request->id_nhanvien;
        $chitiet_kpi = $request->chitiet_kpi;
        $diem = $request->diem_cong_tru;
        $lydo = $request->lydo;
        $hinhanh = $request->hinhanh;

        $result = DiemKPIThang::postChamDiemThang($id_diemkpithang, $diem_kpi);   
        $result = LogChamDiem::postLogChamDiem($id_nhanvien, $chitiet_kpi, $diem, $lydo, $hinhanh);
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
