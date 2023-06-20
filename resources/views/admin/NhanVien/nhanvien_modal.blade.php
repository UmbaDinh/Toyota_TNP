
<div class="modal_them_ct_kpi modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Thêm nhân viên</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="/admin/ct-kpi" id="form-them-ct-kpi">
                    {{ csrf_field() }}
                    <input type="hidden" id="id_ct_kpi" name="id_ct_kpi" />
                    <div class="input-group mb-3 input-success-o">
                        <span class="input-group-text" style="color: black; font-weight: 600">Tên chi tiết KPI</span>
                        <input type="text" class="form-control ten_ct_kpi" placeholder="Nhập tên chi tiết KPI" name="ten_ct_kpi">
                    </div>
                    <div class="row">
                        <div class="col-6">    
                            <div class=" input-group mb-3 input-success-o">
                                <span class="input-group-text" style="color: black; font-weight: 600">Điểm KPI</span>
                                <input type="number" class="form-control diem_ct_kpi" placeholder="Nhập điểm KPI" name="diem_ct_kpi">
                            </div>
                        </div>
                        <div class="col-6">             
                            <div class="input-group mb-3 input-success-o">
                                <span class="input-group-text" style="color: black; font-weight: 600">KPI Tháng</span>
                                <select class="default-select form-control wide thang_ct_kpi" name="thang_ct_kpi" style="display: none;" id="thang_ct_kpi">
									<option value="1" >Tháng 1</option>
									<option value="2" >Tháng 2</option>
									<option value="3" >Tháng 3</option>
									<option value="4" >Tháng 4</option>
									<option value="5" >Tháng 5</option>
									<option value="6" >Tháng 6</option>
									<option value="7" >Tháng 7</option>
									<option value="8" >Tháng 8</option>
									<option value="9" >Tháng 9</option>
									<option value="10" >Tháng 10</option>
									<option value="11" >Tháng 11</option>
									<option value="12" >Tháng 12</option>
								</select>
                            </div> 
                        </div>
                    </div>
                    <div class="form-check custom-checkbox mb-3 checkbox-success check-lg">
                        <input type="checkbox" class="form-check-input trangthai_ct_kpi" checked="" id="customCheckBox8" name="trangthai_ct_kpi" required="">
                        <label class="form-check-label trangthai_ct_kpi" for="customCheckBox8" style="color: black; font-weight: 600; font-size: 15px" name="trangthai_ct_kpi">Hoạt động</label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Thoát</button>
                <button type="button" class="btn btn-primary" id="btn_them_ct_kpi">Thêm</button>
            </div>
        </div>
    </div>
</div>
