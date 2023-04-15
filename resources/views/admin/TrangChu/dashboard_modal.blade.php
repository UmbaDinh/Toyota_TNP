
<div class="modal_add_thongbao modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Thêm mới thông báo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="/admin/ct-kpi" id="form-them-thongbao" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" id="id_thongbao" name="id_thongbao" />
                    <div class="input-group mb-3 input-success-o">
                        <span class="input-group-text" style="color: black; font-weight: 600">Tiêu đề thông báo</span>
                        <input type="text" class="form-control tieu_de_thongbao" placeholder="Nhập tiêu đề thông báo" name="tieu_de_thongbao">
                    </div>
                    <div class="row">
                        <div class="col-12">    
                            <div class=" input-group mb-3 input-success-o">
                                <span class="input-group-text" style="color: black; font-weight: 600">Nhập chi tiết thông báo</span>
                                <input type="text" class="form-control chi_tiet_thongbao" placeholder="Nhập điểm KPI" name="chi_tiet_thongbao">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-group mb-3">
                            <button class="btn btn-primary btn-sm" type="button">Chọn File</button>
                            <div class="form-file">
                                <input type="file" class="form-file-input form-control" name="uploadfile">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Thoát</button>
                <button type="button" class="btn btn-primary" id="btn_them_thongbao">Thêm</button>
            </div>
        </div>
    </div>
</div>
