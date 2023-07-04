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
    $(document).on("click", ".btn_add_donvi", function () {
        $("#id_donvi").prop('readonly', false);
        $("#ma_dv").val(null);
        $(".ten_dv").val(null);
        document.getElementById("customCheckBox8").checked = true;
        // $(".thang_ct_kpi").val(null);
        // $(".trangthai_ct_kpi").val(null);
        $(".modal_them_donvi").modal("show");
    });

// Xử lý cập nhật CT KPI
    $(document).on("click", ".btn_capnhat_donvi", function () {

        $tr = $(this).closest("tr");
        if ($($tr).hasClass("child")) {
            $tr = $tr.prev(".parent");
        }
        var data = table.row($tr).data();

        $("#id_donvi").prop('readonly', true);
        $("#id_donvi").val(data["id_donvi"]);
        $(".ten_dv").val(data["ten_dv"]);
        $(".ma_dv").val(data["ma_dv"]);
        var bien_check = '<span class="badge light badge-danger">Ngừng hoạt động</span>';
        var check = 1;
        if(data["hoat_dong"] == bien_check){
            document.getElementById("customCheckBox8").checked = false;
        }else{
            document.getElementById("customCheckBox8").checked = true;
        }
        $(".modal_them_donvi").modal("show");
    });


// Xử lý thêm CT KPI
    $(document).on("click", "#btn_them_donvi", function () {
        if (!$(".ten_dv").val()) {
            Toast.fire({
                icon: "warning",
                title: "Vui lòng nhập tên đơn vị",
            });
            $(".ten_dv").val()
            return;
        }
        if (!$(".ma_dv").val()) {
            Toast.fire({
                icon: "warning",
                title: "Vui lòng nhập mã đơn vị",
            });
            $(".ma_dv").val()
            return;
        }

        $.ajax({
            type: "POST",
            url:"/admin/donvi",
            data: $("#form-them-donvi").serialize(),
            success: function (data) {
                table.ajax.reload(null, false);
                $(".modal_them_donvi").modal("hide");
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
$(document).on("click", ".btn_xoa_donvi", function () {
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
                $id_donvi = $(this).data("id");
                $token = $('meta[name="csrf-token"]').attr("content");

                $.ajax({
                    type: "DELETE",
                    url:"/admin/donvi",
                    data: { id_donvi: $id_donvi },
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