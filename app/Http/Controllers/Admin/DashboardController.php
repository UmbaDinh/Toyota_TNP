<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Diem;
use App\Models\DonVi;
use App\Models\ViPham;
use App\Models\NhanVien;
use App\Models\ThongBao;
use App\Models\DiemKPIThang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class DashboardController extends Controller
{
    public function index(Request $request)
    {   
        $data = ThongBao::get_all_thongbao();
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('actions', function ($row) {
                    $action = '
                            <button type="button" class="btn btn-rounded btn-info btn_capnhat_thongbao" data-id="'.$row->ID_THONGBAO.'">
                            <span class="btn-icon-start text-info">
                                <i class="fas fa-pencil-alt"></i>
                            </span>Sửa
                            </button>
                            &nbsp;
                            <button type="button" class="btn btn-rounded btn-danger btn_xoa_thongbao"
                                data-id="'.$row->ID_THONGBAO.'">
                                <span class="btn-icon-start text-danger">
                                    <i class="fa fa-trash"></i>
                                </span>Xóa
                            </button>'
                               ;
                    return $action;
                })
                ->rawColumns(['actions'])
                ->make(true);
        }
        return view('admin.TrangChu.dashboard', [
            'getThongBao' => (new ThongBao())->get_all_thongbao(),
            'TTDonVi' => (new DonVi())->get_all_donvi(),
            'DiemKPIThang' => (new DiemKPIThang())->get_all_theothang(),
        ]);
    }

// Thêm dữ liệu    
    public function postThongBao(Request $request){
        $ID_THONGBAO = $request->id_thongbao ?? 0;
        $TIEUDE_THONGBAO = $request->tieu_de_thongbao;
        $NOIDUNG_THONGBAO = $request->chi_tiet_thongbao;
        if($request->hasFile('uploadfile'))
        {
            $file = $request->file('uploadfile');
            $extension = $file->getClientOriginalExtension();
            $filename = time(). '.' .$extension;
            $file->move('uploads/ThongBao', $filename);
            $result = ThongBao::postThongBao($ID_THONGBAO, $TIEUDE_THONGBAO, $NOIDUNG_THONGBAO, $filename);     
        }else{
            $ten_file = "Khong co";
            $result = ThongBao::postThongBao($ID_THONGBAO, $TIEUDE_THONGBAO, $NOIDUNG_THONGBAO, $ten_file);     
        }
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
    public function deleteThongBao(Request $request)
    {
        $id_thongbao = $request->id_thongbao;
        $thongbao = ThongBao::find($id_thongbao);
        if($thongbao)
        {
            $path = 'uploads/ThongBao/'.$thongbao->upload_file;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $thongbao->delete();
            return response()->json([
                'status'=>200,
                'message'=> "Xóa thông báo thành công"
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'Nhan Vien Not Found'
            ]);
        }
    }

}
