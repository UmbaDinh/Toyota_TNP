
<div class="modal_them_donvi modal fade bd-example" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Thêm đơn vị</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="/admin/donvi" id="form-them-donvi">
                    {{ csrf_field() }}
                    <input type="hidden" id="id_donvi" name="id_donvi" />
                    <div class="input-group mb-3 input-success-o">
                        <span class="input-group-text" style="color: black; font-weight: 600">Mã đơn vị</span>
                        <input type="text" class="form-control ma_dv" placeholder="Nhập vào mã đơn vị" name="ma_dv">
                    </div>
                    <div class="row">
                        <div class="col-12">    
                            <div class=" input-group mb-3 input-success-o">
                                <span class="input-group-text" style="color: black; font-weight: 600">Tên đơn vị</span>
                                <input type="text" class="form-control ten_dv" placeholder="Nhập tên đơn vị" name="ten_dv">
                            </div>
                        </div>
                    </div>
                    <div class="form-check custom-checkbox mb-3 checkbox-success check-lg">
                        <input type="checkbox" class="form-check-input hoat_dong" checked="" id="customCheckBox8" name="hoat_dong" required="">
                        <label class="form-check-label hoat_dong" for="customCheckBox8" style="color: black; font-weight: 600; font-size: 15px" name="hoat_dong">Hoạt động</label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Thoát</button>
                &nbsp;&nbsp;&nbsp;&nbsp; 
                <button type="button" class="btn btn-primary" id="btn_them_donvi">Thêm</button>
            </div>
        </div>
    </div>
</div>
