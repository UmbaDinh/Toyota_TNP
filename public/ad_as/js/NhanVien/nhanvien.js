$(document).ready(function() {
    alertify.set('notifier','position', 'top-center');
    alertify.success('Quản lý nhân viên');

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
            url:"/admin/nhanvien",
        },
        columns: [
            // { data: "ten_ct_kpi", width: "5%", visible:false },
            {
                data: null,
                render: function (data, type, row, meta) {
                    // Trả về số thứ tự dựa trên meta.row
                    return meta.row + 1;
                }
            },
            {
                data: "ho_ten",
            },
            {
                data: "gioi_tinh"
            },
            {
                data: "ten_donvi",
            },
            {
                data: "trangthai_nhanvien",
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
});