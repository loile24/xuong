<div class="app-sidebar__user"><img class="app-sidebar__user-avatar"
        src="https://scontent.fhan17-1.fna.fbcdn.net/v/t39.30808-1/427654744_1595434564625875_3551239431471717001_n.jpg?stp=dst-jpg_p200x200&_nc_cat=109&ccb=1-7&_nc_sid=0ecb9b&_nc_eui2=AeHFuOiUJ_bfwo4v55XsTgw0M2HJwIrVRuIzYcnAitVG4iQyMWPFI4iZ8iu9j75e50vrZEjPH8OfgU1sudnquDk-&_nc_ohc=IKk2Z7b-Z3EQ7kNvgGUOZu-&_nc_ht=scontent.fhan17-1.fna&oh=00_AYA6RtJ1NWsJA7StsPR-FZ6UiFwHPgPzobBsktnYRsxL2w&oe=66B1A998"
        width="50px" alt="User Image">
    <div>
        <p class="app-sidebar__user-name"><b>Chinh admin</b></p>
        <p class="app-sidebar__user-designation">Chào mừng bạn trở lại</p>
    </div>
</div>
<hr>
<ul class="app-menu">
    <li><a class="app-menu__item active" href="{{route('thongke.getThongKe')}}"><i class='app-menu__icon bx bx-tachometer'></i><span
                class="app-menu__label">Bảng điều khiển</span></a></li>
    <li><a class="app-menu__item " href="{{route('danhmuc.index')}}"><i class='app-menu__icon bx bx-id-card'></i> <span
                class="app-menu__label">Quản lý Danh Mục</span></a></li>
    <li><a class="app-menu__item" href="{{route('taikhoan.index')}}"><i class='app-menu__icon bx bx-user-voice'></i><span
                class="app-menu__label">Quản lý tài khoản</span></a></li>
    <li><a class="app-menu__item" href="{{route('sanpham.index')}}"><i
                class='app-menu__icon bx bx-purchase-tag-alt'></i><span class="app-menu__label">Quản lý sản
                phẩm</span></a>
    </li>
    <li><a class="app-menu__item" href="{{route('donhang.index')}}"><i class='app-menu__icon bx bx-task'></i><span
                class="app-menu__label">Quản lý đơn hàng</span></a></li>
    <li><a class="app-menu__item" href="{{route('thongtin.index')}}"><i class='app-menu__icon bx bx-run'></i><span
                class="app-menu__label">Quản lý thông tin website
            </span></a></li>
    <li><a class="app-menu__item" href="{{route('contact.index')}}"><i class='app-menu__icon bx bx-dollar'></i><span
                class="app-menu__label">Quản lý liên hệ</span></a></li>

    <li><a class="app-menu__item" href="{{route('blogs.index')}}"><i class='app-menu__icon bx bx-pie-chart-alt-2'></i><span
                class="app-menu__label">Quản lý Bài Viết</span></a>
    </li>
     {{--
    <li><a class="app-menu__item" href="#"><i class='app-menu__icon bx bx-calendar-check'></i><span
                class="app-menu__label">Lịch công tác </span></a></li> --}}
    <li><a class="app-menu__item" href="#"><i class='app-menu__icon bx bx-cog'></i><span
                class="app-menu__label">Cài
                đặt hệ thống</span></a></li>
</ul>
