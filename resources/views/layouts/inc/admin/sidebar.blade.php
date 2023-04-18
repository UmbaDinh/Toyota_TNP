<div class="dlabnav">
    <div class="dlabnav-scroll">
        <ul class="metismenu" id="menu">
            <li>
                <a class="has-arrow " href="javascript:void()" aria-expanded="false">
                    <i class="fas fa-home"></i>
                    <span class="nav-text">Trang chủ</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('admin.trangchu') }}">Quản trị</a></li>
                    <li><a href="{{ route('admin.trangchucanhan') }}">Cá nhân</a></li>
                </ul>
            </li>

            <li>
                <a class="has-arrow " href="javascript:void()" aria-expanded="false">
                    <i class="fas fa-info-circle"></i>
                    <span class="nav-text">Thông tin</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('admin.hosocanhan') }}">Hồ sơ cá nhân</a></li>
                </ul>
            </li>
            <li>
                <a class="has-arrow " href="javascript:void()" aria-expanded="false">
                    <i class="fas fa-clone"></i>
                    <span class="nav-text">QL Công ty</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('admin.donvi') }}">Đơn vị</a></li>
                    <li><a href="{{ route('admin.nhanvien') }}">Nhân viên</a></li>
                </ul>
            </li>
            <li>
                <a class="has-arrow " href="javascript:void()" aria-expanded="false">
                    <i class="fas fa-file-alt"></i>
                    <span class="nav-text">KPI</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('admin.chitietkpi') }}">Chi tiết KPI</a></li>
                    <li><a href="{{ route('admin.chamdiemkpi') }}">Chấm điểm KPI</a></li>
                </ul>
            </li>

        </ul>
        <div class="copyright">
            <p><strong>Toyota Thập Nhất Phong Admin</strong> © 2023</p>
            <p class="fs-12">Chúc các bạn một ngày tốt lành <span class="heart"></span></p>
        </div>
    </div>
</div>
