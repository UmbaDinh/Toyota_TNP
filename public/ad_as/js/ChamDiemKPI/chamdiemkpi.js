$(document).ready(function() {
    alertify.set('notifier','position', 'top-center');
    alertify.success('Quản lý nhân viên');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
//Khai báo biến toàn cục    
    var table;

//Hiển thị dữ liệu chi tiết KPI    
    $('#example3').DataTable().destroy();
    table = $("#example3").DataTable({
        dom: 'Bfrtip',
        processing: true,
        serverSide: true,
        responsive: true,
        autoWidth: false,
        ajax: {
            url:"/admin/chamdiem-kpi",
        },
        columns: [
            // { data: "ten_ct_kpi", width: "5%", visible:false },
            {
                data: "ho_ten",
            },
            { data: "actions", width: "40%", className:"text-center" },
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

// Lấy data select load nhân viên
    $(document).on("change", "#select_donvi", function () {
        var e = document.getElementById("select_donvi");
        var data_donvi = e.options[e.selectedIndex].value;
        var str_donvi = data_donvi.split("-");
        $(".ten_donvi").val(str_donvi[1]);
        $("#id_donvi").val(str_donvi[0]);

        loadnhanvien_theodonvi(str_donvi[0]);

    });
    // Hàm load nhân viên theo đơn vị
    function loadnhanvien_theodonvi(id_donvi){
        $('#example3').DataTable().destroy();
        table = $("#example3").DataTable({
            dom: 'Bfrtip',
            processing: true,
            serverSide: true,
            responsive: true,
            autoWidth: false,
            ajax: {
                url:"/admin/chamdiem-kpi/"+id_donvi,
            },
            columns: [
                // { data: "ten_ct_kpi", width: "5%", visible:false },
                {
                    data: "ho_ten",
                },
                { data: "actions", width: "40%", className:"text-center" },
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
    }

// Xử lý load dữ liệu chấm điểm
    $(document).on("click", ".btn_load_dl", function () {
        //XL Lấy dl từ table
        $tr = $(this).closest("tr");
        if ($($tr).hasClass("child")) {
            $tr = $tr.prev(".parent");
        }
        console.log($tr);
        var data = table.row($tr).data();
        //XL Lấy Tháng hiện tại
        var currentDate = new Date();
        //var currentMonth = currentDate.getMonth() + 1;
        //Thang -1
        var currentMonth = currentDate.getMonth();
        //Xl Load dl lên form
        $("#id_chamdiem").val(data["id_nhanvien"]+'-'+currentMonth);
        $("#id_nhanvien").val(data["id_nhanvien"]);
        $(".ht_nhanvien").val(data["ho_ten"]);
        
    });    


// Xử lý thêm CT KPI
    $(document).on("click", "#btn_cham_diem", function () {
        if (!$(".diem_cong_tru").val()) {
            Toast.fire({
                icon: "warning",
                title: "Vui lòng điểm cộng trừ",
            });
            $(".diem_cong_tru").val()
            return;
        }

        $.ajax({
            type: "POST",
            url:"/admin/chamdiem-kpi",
            data: $("#form-chamdiem-kpi").serialize(),
            success: function (data) {
                alertify.set('notifier','position', 'top-center');
                alertify.success('Thao tác thành công');
            },
            error: function (error) {
                alertify.set('notifier','position', 'top-center');
                alertify.success('Thao tác thất bại');
            },
        });
    });

});