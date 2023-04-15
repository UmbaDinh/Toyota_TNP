$(document).ready(function() {
    alertify.set('notifier','position', 'top-center');
    alertify.success('Trang chủ Admin');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
//Hiển thị dữ liệu chi tiết KPI    
    // $('#example3').DataTable().destroy();
    // var table = $("#example3").DataTable({
    //     dom: 'Bfrtip',
    //     processing: true,
    //     serverSide: true,
    //     responsive: true,
    //     autoWidth: false,
    //     ajax: {
    //         url:"/admin/trangchu",
    //     },
    //     columns: [
    //         // { data: "ten_ct_kpi", width: "5%", visible:false },
    //         {
    //             data: "TIEUDE_THONGBAO",
    //         },
    //         {
    //             data: "NOIDUNG_THONGBAO"
    //         },
    //         { data: "actions", width: "25%", className:"text-center" },
    //     ],
    //     language: {
    //         decimal: "",
    //         emptyTable: "không có dữ liệu trong bảng",
    //         infoEmpty: "Hiển thị 0 đến 0 của 0 kết quả",
    //         infoFiltered: "(lọc từ _MAX_ tổng kết quả)",
    //         infoPostFix: "",
    //         thousands: ",",
    //         lengthMenu: "Hiển thị _MENU_ kết quả",
    //         loadingRecords: "Loading...",
    //         processing: "Đang nạp dữ liệu...",
    //         search: "Tìm kiếm:",
    //         zeroRecords: "Không tìm thấy kết quả",
    //         paginate: {
    //             first: "Trang đầu",
    //             last: "Trang cuối",
    //             next: ">>",
    //             previous: "<<",
    //         },
    //         aria: {
    //             sortAscending: ": sắp xếp tăng dần",
    //             sortDescending: ": sắp xếp giảm dần",
    //         },
    //     },
    // });



// Xử lý nút thêm CT KPI
    $(document).on("click", ".btn_add_thongbao", function () {
        $("#id_thongbao").prop('readonly', false);
        $("#id_thongbao").val(null);
        $(".tieu_de_thongbao").val(null);
        $(".chi_tiet_thongbao").val(null);
        $(".modal_add_thongbao").modal("show");
    });

// Xử lý cập thật CT KPI
    $(document).on("click", ".btn-update-thongbao", function () {

        $("#id_thongbao").prop('readonly', true);
        $("#id_thongbao").val($(this).data("id"));
        $(".tieu_de_thongbao").val($(this).data("tieude"));
        $(".chi_tiet_thongbao").val($(this).data("chitiet"));
        $(".modal_add_thongbao").modal("show");
    });


// Xử lý thêm CT KPI
    $(document).on("click", "#btn_them_thongbao", function () {
    if (!$(".tieu_de_thongbao").val()) {
      Toast.fire({
        icon: "warning",
        title: "Vui lòng nhập tiêu đề thông báo",
      });
      $(".tieu_de_thongbao").val()
      return;
    }
    var form_data = new FormData($("#form-them-thongbao")[0]);
    $.ajax({
      type: "POST",
      url:"/admin/trangchu/thongbao",
      data: form_data,
      contentType: false,
      processData: false,
      success: function (data) {
        // table.ajax.reload(null, false);
        $(".modal_add_thongbao").modal("hide");
        Toast.fire({
          icon: "success",
          title: "Thêm thông báo thành công!!!",
        });
        setTimeout(function(){
          location.reload();
        }, 1500);
      },
      error: function (error) {
        console.log(error);
        Toast.fire({
          icon: "danger",
          title: "Thêm thông báo thất bài",
        });
      },
    });
    });
  

// Xóa CT KPI
    $(document).on("click", ".btn-delete-thongbao", function () {
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
                    $id_thongbao = $(this).data("id");
                    $token = $('meta[name="csrf-token"]').attr("content");

                    $.ajax({
                        type: "DELETE",
                        url:"/admin/trangchu/delete_thongbao",
                        data: { id_thongbao: $id_thongbao },
                        headers: {
                            "X-CSRF-TOKEN": $token,
                        },
                        success: function (data) {
                            Toast.fire({
                                icon: "success",
                                title: "Xóa thông báo thành công!!!",
                            });
                        setTimeout(function(){
                            location.reload();
                        }, 1500);
                        },
                        error: function (error) {
                            console.log(error);
                            Toast.fire({
                                icon: "danger",
                                title: "Xóa thông báo thất bài",
                            });
                        },
                    });
                }
            });
    });    
});