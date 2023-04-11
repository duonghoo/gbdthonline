<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    <div class="c-sidebar-brand d-lg-down-none">
        <svg class="c-sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
            <use xlink:href="/admin/images/icon-svg/coreui.svg#full"></use>
        </svg>
        <svg class="c-sidebar-brand-minimized" width="46" height="46" alt="CoreUI Logo">
            <use xlink:href="/admin/images/icon-svg/coreui.svg#signet"></use>
        </svg>
    </div>
    <ul class="c-sidebar-nav ps ps--active-y">
        @if(!empty($permission['category']))
        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
            <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="/admin/images/icon-svg/free.svg#cil-list"></use>
                </svg>
                Chuyên mục
            </a>
            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="/admin/category"><span class="c-sidebar-nav-icon"></span> Danh sách</a></li>
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="/admin/category/update"><span class="c-sidebar-nav-icon"></span> Thêm mới</a></li>
            </ul>
        </li>
        @endif
        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
            <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="/admin/images/icon-svg/free.svg#cil-list"></use>
                </svg>
                Domain
            </a>
            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="/admin/domain"><span
                            class="c-sidebar-nav-icon"></span> Danh sách</a></li>
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="/admin/domain/update"><span
                            class="c-sidebar-nav-icon"></span> Thêm mới</a></li>
            </ul>
        </li>
        @if(!empty($permission['post']))
        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown @if(getCurrentController() == 'post') c-show @endif">
            <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="/admin/images/icon-svg/free.svg#cil-description"></use>
                </svg>
                Bài viết
            </a>
            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link @if(!empty($_GET['status']) && empty($_GET['hen_gio'])) c-active @endif" href="/admin/post?status=1"><span class="c-sidebar-nav-icon"></span> Danh sách</a></li>
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="/admin/post/update"><span class="c-sidebar-nav-icon"></span> Thêm mới</a></li>
            </ul>
        </li>
        @endif
        @if(!empty($permission['page']))
            <li class="c-sidebar-nav-item c-sidebar-nav-dropdown @if(getCurrentController() == 'page') c-show @endif">
                <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
                    <svg class="c-sidebar-nav-icon">
                        <use xlink:href="/admin/images/icon-svg/free.svg#cil-notes"></use>
                    </svg>
                    Trang tĩnh
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link @if(!empty($_GET['status'])) c-active @endif" href="/admin/page?status=1"><span class="c-sidebar-nav-icon"></span> Danh sách</a></li>
                    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="/admin/page/update"><span class="c-sidebar-nav-icon"></span> Thêm mới</a></li>
                </ul>
            </li>
        @endif

        @if(!empty($permission['post']))
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link"
                   href="#"
                   onclick="MyWindow=window.open('/admin/libraries/elfinder/file-elfinder.php?mode=chosefile&control=img','MyWindow','width=800,height=600'); return false;">
                    <svg class="c-sidebar-nav-icon">
                        <use xlink:href="/admin/images/icon-svg/free.svg#cil-image-plus"></use>
                    </svg>
                    Media
                </a>
            </li>
        @endif
        @if(!empty($permission['tag']))
        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
            <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="/admin/images/icon-svg/free.svg#cil-tag"></use>
                </svg>
                Thẻ tag
            </a>
            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="/admin/tag"><span class="c-sidebar-nav-icon"></span> Danh sách</a></li>
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="/admin/tag/update"><span class="c-sidebar-nav-icon"></span> Thêm mới</a></li>
            </ul>
        </li>
        @endif
        @if(!empty($permission['top_game']))
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="/admin/top_game/home_feature">
                    <svg class="c-sidebar-nav-icon">
                        <use xlink:href="/admin/images/icon-svg/free.svg#cil-bank"></use>
                    </svg>
                    Top game trang chủ
                </a>
            </li>
        @endif
        @if(!empty($permission['top_game']))
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="/admin/top_game/category/916">
                    <svg class="c-sidebar-nav-icon">
                        <use xlink:href="/admin/images/icon-svg/free.svg#cil-bank"></use>
                    </svg>
                    Top game chuyên mục
                </a>
            </li>
        @endif
        {{-- @if(Auth::user()->username == 'vinhnt')
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="/admin/banner">
                    <svg class="c-sidebar-nav-icon">
                        <use xlink:href="/admin/images/icon-svg/free.svg#cil-terrain"></use>
                    </svg>
                    Banner quảng cáo
                </a>
            </li>
        @endif --}}
        @if(!empty($permission['user']))
        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
            <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="/admin/images/icon-svg/free.svg#cil-user"></use>
                </svg>
                Thành viên
            </a>
            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="/admin/user"><span class="c-sidebar-nav-icon"></span> Danh sách</a></li>
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="/admin/user/update"><span class="c-sidebar-nav-icon"></span> Thêm mới</a></li>
                @if(!empty($permission['group']))
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="/admin/group"><span class="c-sidebar-nav-icon"></span> Phân quyền</a></li>
                @endif
            </ul>
        </li>
        @endif
        @if(!empty($permission['site_setting']))
            <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
                <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
                    <svg class="c-sidebar-nav-icon">
                        <use xlink:href="/admin/images/icon-svg/free.svg#cil-settings"></use>
                    </svg>
                    Cấu hình chung
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="/admin/redirect"><span class="c-sidebar-nav-icon"></span> Chuyển hướng</a></li>
                    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="/admin/site_setting/update"><span class="c-sidebar-nav-icon"></span> Thông tin trang</a></li>
                </ul>
            </li>
        @endif
        @if(!empty($permission['site_setting']))
            <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
                <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
                    <svg class="c-sidebar-nav-icon">
                        <use xlink:href="/admin/images/icon-svg/free.svg#cil-settings"></use>
                    </svg>
                    Cấu hình Giao diện
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="/admin/menu"><span class="c-sidebar-nav-icon"></span> Cấu hình Menu</a></li>
                    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="/admin/box_news"><span class="c-sidebar-nav-icon"></span> Cấu hình Box News</a></li>
                </ul>
            </li>
        @endif
    </ul>
    <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
</div>
