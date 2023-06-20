$(document).ready(function() {
    alertify.set('notifier','position', 'top-center');
    alertify.success('Hồ sơ cá nhân');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    load_thongtin();

    // Hàm load thông tin cá nhân
    function load_thongtin(){
        $.ajax({
            type: "GET",
            url: "/admin/hosocanhan2",
            data: "json",
            success: function (response){
                //console.log(response.nhanvien);
                $("#UpdateNhanVienFORM").html("");
                $.each(response.nhanvien, function (key, item){
                    $.each(response.donvi, function (key, donvi){
                        if(item.id_donvi == donvi.id_donvi)
                        {
                            donvi2 = donvi.ten_dv;                        
                        }
                    });

                    var ngaysinh = new Date(item.ngay_sinh); 
                    var ngaycap =  new Date(item.ngay_cap); 
                    var ngaylamviec =  new Date(item.ngay_nhan_viec); 

    
                    var fm_ngaysinh = new Intl.DateTimeFormat('en-US').format(ngaysinh);
                    var fm_ngaycap = new Intl.DateTimeFormat('en-US').format(ngaycap);
                    var fm_ngaylamviec = new Intl.DateTimeFormat('en-US').format(ngaylamviec);


                    $("#UpdateNhanVienFORM").append('<div class="row">\
                    <div class="mb-3 col-md-6">\
                        <label class="form-label">Họ và tên</label>\
                        <input type="text" placeholder="Họ và tên" value="'+item.ho_ten+'" name="ho_ten" class="form-control">\
                    </div>\
                    <div class="col-md-6">\
                        <label class="form-label">Ngày sinh</label>\
                        <input type="date" placeholder="Ngày sinh" value="'+item.ngay_sinh+'" name="ngay_sinh"\
                            class="form-control">\
                    </div>\
                </div>\
                <div class="row">\
                    <div class="mb-3 col-md-6">\
                        <label class="form-label">Giới tính</label>\
                        <select class="form-control default-select wide" name="gioi_tinh" id="inputState">\
                            @if ($itemTT_CaNhan->gioi_tinh == "Nam")\
                                <option value="{{ $itemTT_CaNhan->gioi_tinh }}" selected="">{{ $itemTT_CaNhan->gioi_tinh }}</option>\
                                <option value="Nữ">Nữ</option>\
                            @else\
                                <option value="{{ $itemTT_CaNhan->gioi_tinh }}" selected="">{{ $itemTT_CaNhan->gioi_tinh }}</option>\
                                <option value="Nam">Nam</option>\
                            @endif\
                        </select>\
                    </div>\
                    <div class="col-md-6">\
                        <label class="form-label">Số điện thoại</label>\
                        <input type="text" placeholder="Số điện thoại" value="'+item.so_dien_thoai+'" class="form-control">\
                    </div>\
                </div>\
                <div class="mb-3">\
                    <label class="form-label">Địa chỉ</label>\
                    <input type="text" placeholder="Địa chỉ"  value="'+item.dia_chi_thuong_tru+'" class="form-control">\
                </div>\
                <div class="row">\
                    <div class="col-md-4">\
                        <label class="form-label">CMND/CCCD</label>\
                        <input type="text" placeholder="Chứng minh nhân dân/Căn cước công dân"  value="'+item.cmnd+'" class="form-control">\
                    </div>\
                    <div class="col-md-4">\
                        <label class="form-label">Nơi cấp</label>\
                        <input type="text" placeholder="Nơi cấp"  value="'+item.noi_cap+'" class="form-control">\
                    </div>\
                    <div class="col-md-4">\
                        <label class="form-label">Ngày cấp</label>\
                        <input type="date" placeholder="Nơi cấp"  value="'+item.ngay_cap+'" class="form-control">\
                    </div>\
                </div>\
                <div style="text-align: right; margin-top: 5px">\
                <button class="btn btn-primary"  id="btn_thaydoi">Thay đổi</button>\
                </div>\
                    ');
                });

            }
        });
    }
});