$(document).ready(function() {
    alertify.set('notifier','position', 'top-center');
    alertify.success('Quản lý đơn vị');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //Hiển thị dữ liệu chi tiết KPI    
    $('#example3').DataTable().destroy();
    var table = $("#example3").DataTable({
        dom: 'Bfrtip',
        processing: true,
        serverSide: true,
        responsive: true,
        autoWidth: false,
        ajax: {
            url:"/admin/donvi",
        },
        columns: [
            {
                data: "id_donvi",
                className: "text-center",
            },
            {
                data: "ma_dv",
            },
            {
                data: "ten_dv"
            },
            {
                data: "hoat_dong",
                className: "text-center"
            },
            { data: "actions", width: "25%", className:"text-center" },
        ],
        language: {
            decimal: "",
            emptyTable: "không có dữ liệu trong bảng",
            infoEmpty: "Hiển thị 0 đến 0 của 0 kết quả",
            infoFiltered: "(lọc từ _MAX_ tổng kết quả)",
            infoPostFix: "",
            thousands: ",",
            lengthMenu: "Hiển thị _MENU_ kết quả",
            loadingRecords: "Loading...",
            processing: "Đang nạp dữ liệu...",
            search: "Tìm kiếm:",
            zeroRecords: "Không tìm thấy kết quả",
            paginate: {
                first: "Trang đầu",
                last: "Trang cuối",
                next: ">>",
                previous: "<<",
            },
            aria: {
                sortAscending: ": sắp xếp tăng dần",
                sortDescending: ": sắp xếp giảm dần",
            },
        },
    });

// Xử lý nút thêm CT KPI
    $(document).on("click", ".btn_add_ct_kpi", function () {
        $("#id_ct_kpi").prop('readonly', false);
        $("#id_ct_kpi").val(null);
        $(".ten_ct_kpi").val(null);
        $(".diem_ct_kpi").val(null);
        document.getElementById("customCheckBox8").checked = true;
        // $(".thang_ct_kpi").val(null);
        // $(".trangthai_ct_kpi").val(null);
        $(".modal_them_ct_kpi").modal("show");
    });

// Xử lý cập thật CT KPI
    $(document).on("click", ".btn_capnhat_ct_kpi", function () {

        $tr = $(this).closest("tr");
        if ($($tr).hasClass("child")) {
            $tr = $tr.prev(".parent");
        }
        var data = table.row($tr).data();

        $("#id_ct_kpi").prop('readonly', true);
        $("#id_ct_kpi").val(data["id_ct_kpi"]);
        $(".ten_ct_kpi").val(data["ten_ct_kpi"]);
        $(".diem_ct_kpi").val(data["diem_ct_kpi"]);
        $('.nice-select.default-select.thang_ct_kpi').find('li[data-value="'+data['thang_ct_kpi']+'"]').click();
        var bien_check = '<span class="badge light badge-danger">Ngừng hoạt động</span>';
        var check = 1;
        if(data["trangthai_ct_kpi"] == bien_check){
            document.getElementById("customCheckBox8").checked = false;
        }else{
            document.getElementById("customCheckBox8").checked = true;
        }

        $(".modal_them_ct_kpi").modal("show");
    });


// Xử lý thêm CT KPI
    $(document).on("click", "#btn_them_ct_kpi", function () {
        if (!$(".ten_ct_kpi").val()) {
            Toast.fire({
                icon: "warning",
                title: "Vui lòng nhập tên KPI",
            });
            $(".ten_ct_kpi").val()
            return;
        }
        // if($("input[data-bootstrap-switch]").bootstrapSwitch('state')){
        //     $("#NGANHHANG_TRANGTHAI").val(1);
        // }
        // else{
        //     $("#NGANHHANG_TRANGTHAI").val(0);
        // }

        $.ajax({
            type: "POST",
            url:"/admin/ct-kpi",
            data: $("#form-them-ct-kpi").serialize(),
            success: function (data) {
                table.ajax.reload(null, false);
                $(".modal_them_ct_kpi").modal("hide");
                alertify.set('notifier','position', 'top-center');
                alertify.success('Thao tác thành công');
            },
            error: function (error) {
                console.log(error);
                alertify.set('notifier','position', 'top-center');
                alertify.success('Thao tác thất bại');
            },
        });
    });


// Xóa CT KPI
    $(document).on("click", ".btn_xoa_ct_kpi", function () {
        swalWithBootstrapButtons
            .fire({
                title: "Xóa lựa chọn này?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Xóa",
                cancelButtonText: "Thoát",
                reverseButtons: true,
            })
            .then((result) => {
                if (result.value) {
                    $id_ct_kpi = $(this).data("id");
                    $token = $('meta[name="csrf-token"]').attr("content");

                    $.ajax({
                        type: "DELETE",
                        url:"/admin/ct-kpi",
                        data: { id_ct_kpi: $id_ct_kpi },
                        headers: {
                            "X-CSRF-TOKEN": $token,
                        },
                        success: function (data) {
                            table.ajax.reload(null, false);
                            alertify.set('notifier','position', 'top-center');
                            alertify.success('Thao tác thành công');
                        },
                        error: function (error) {
                            console.log(error);
                        },
                    });
                }
            });
    });    
});