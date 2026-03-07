@php
    $logo = setting('site_logo', '');
    $brand = setting('site_brand', '');
    $title = isset($title) ? $title : setting('site_homepage_title', '');
@endphp
<style>
    .nav-menu-item-name{
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 5px
    }
    #wd::placeholder {
        color: #ffffff;
        /* đổi sang màu bạn muốn */
        opacity: 1;
        /* tránh bị mờ mặc định */
    }

    .stui-header__search {
        margin-top: 0 !important;
    }

    .form-control {
        color: #ffffff;
    }

    .stui-header__top {
        background-color: hsl(225 25% 10% / 0.4);
    }

    .stui-header__top.scrolled {
        background-color: hsl(225 25% 10% / 0.8);

    }

    .bg-22272f {
        background: linear-gradient(90deg, #6366f1, #ec4899);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 4px;
    }

    .stui-header__menu {
        display: flex;
        align-items: center;
    }

    .stui-header__menu li {
        margin-right: 5px
    }

    .menu-box {
        display: none;
    }

    .menu-box.show {
        display: block;
    }

    .bx91k {
        padding: 16px;
        font-family: Arial, sans-serif;
    }

    .bx91k2-font-family {
        font-family: Arial, sans-serif;
    }

    .srx44p {
        position: relative;
        margin-bottom: 16px;
    }

    .icn88a {
        position: absolute;
        left: 12px;
        top: 50%;
        transform: translateY(-50%);
        width: 16px;
        height: 16px;
    }

    .ipt77q {
        background-color: #22272f;
        width: 100%;
        padding: 10px 16px 10px 36px;
        border-radius: 8px;

        font-size: 14px;
    }

    .drp55z {
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        margin-top: 6px;
        background: white;
        border-radius: 8px;
        box-shadow: 0 10px 25px rgba(0,
                0,
                0,
                0.15);
    }

    .itm01x {
        display: flex;
        justify-content: space-between;
        padding: 12px 16px;
        text-decoration: none;
        border-bottom: 1px solid #eee;
    }

    .bdg77r {
        font-size: 12px;
        background: #e0edff;
        color: #2563eb;
        padding: 2px 8px;
        border-radius: 20px;
    }

    .lnk09p {
        display: block;
        padding: 10px 12px;
        text-decoration: none;
        color: #e7ebef;
        border-radius: 6px;
    }

    .lnk09p:hover {
        background: #0e1115;
        color: #3dbb2b;
    }

    .sec66t {
        /* margin-top: 10px; */
    }

    .btn33k {
        color: #e7ebef;
        width: 100%;
        padding: 10px 12px;
        border: none;
        background: none;
        text-align: left;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .grd22v {
        display: grid;
        grid-template-columns: repeat(2,
                1fr);
        gap: 4px;
        padding: 8px 12px;
    }

    #result {
        margin-top: 20px;
        background-color: #171a20;
        ;
        list-style-type: none;
        width: 500px;
        position: absolute;
        top: 32px;
        z-index: 100;
        padding-left: 0;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 12px 30px rgba(0,
                0,
                0,
                0.08);
        /* border: 1px solid #171a20; */
    }

    .column {
        float: left;
        padding: 5px;
    }

    .left {
        text-align: center;
        width: 20%;
    }

    .right {
        width: 80%;
    }

    .rowsearch:after {
        content: "";
        display: table;
        clear: both;
    }

    #result .rowsearch {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #result .rowsearch p {
        margin-bottom: 1px;
    }

    .rowsearch:hover {
        background-color: #21242c;
    }

    .stui-header_bd {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .dropdown-content {
        border-radius: 8px;
        display: none;
        position: absolute;
        background-color: #1b1f27;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(232,
                204,
                204,
                0.2);
        z-index: 1;
        /* max-height: 300px;
        overflow: auto; */
        /* display: grid; */
        grid-template-columns: repeat(3,
                1fr);
        gap: 5px;
        padding: 10px;
        overflow: hidden;
    }

    .grd22v {
        display: none;
    }

    .grd22v.active {
        display: grid;
    }

    .grd22v.active a {
        padding-top: 5px;
        padding-bottom: 5px;
    }

    .drp55z {
        display: none;
    }

    .drp55z.show {
        display: block;
        background-color: #171a20;
        border: 1px solid #0e1115;
    }

    .dropdown-content li a {
        white-space: nowrap;
    }

    .dropdown:hover .dropdown-content {
        display: grid;
    }

    .flex {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    @media (max-width: 767px) {
        .stui-header__menu {
            display: none;
        }

        .stui-header__side {
            display: none;
        }

        .stui-header_bd {
            margin-right: 15px;
            margin-left: 15px;
        }
    }

    @media (max-width: 1024px) {

        .stui-header__menu {
            display: none;
        }

        .stui-header__search {
            width: 350px;
        }
    }

    .icon-category-cus {
        cursor: pointer;
        display: none;
    }

    .logo-img {
        width: 150px;
        object-fit: cover;
    }

    @media (max-width: 1200px) {
        .icon-category-cus {
            display: block;
        }

        .stui-header__menu {
            display: none;
        }

        .stui-header__search {
            width: 350px;
        }
    }

    .flex-centen {
        display: flex;
        align-items: center;
        justify-content: center;
        /* margin-top: 15px; */
    }

    .logo-wrapper {
        display: flex;
        align-items: center;
        gap: 12px;
        cursor: pointer;
    }

    /* Logo ảnh */
    .logo-img {
        width: 48px;
        height: 48px;
        border-radius: 14px;
        object-fit: cover;
        animation: spinLogo 4s linear infinite;
    }

    @keyframes spinLogo {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }

    /* Hover hiệu ứng nổi + xoay nhẹ */
    /* .logo-wrapper:hover .logo-img {
    transform: translateY(-4px) rotate(5deg) scale(1.08);
    box-shadow: 0 20px 40px rgba(0,0,0,0.3);
} */
    /* Text */
    .logo-text h1 {
        font-size: 20px;
        font-weight: 800;
        margin: 0;
        letter-spacing: -0.5px;
        transition: transform 0.3s ease;
    }

    .logo-wrapper:hover .logo-text h1 {
        transform: translateX(4px);
    }

    .logo-text p {
        font-size: 8px;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: #9ca3af;
        margin: 1px 0 0;
    }

    /* Gradient chữ */
    .gradient-text {
        background: linear-gradient(90deg, #6366f1, #ec4899);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
</style>
<header class="stui-header__top clearfix" id="header-top">
    <div class="container">
        <div class="row ">
            <div class="stui-header_bd  flex">
                <a href="/" class="logo-wrapper">
                    <img src="{{ $logo }}" alt="Phim Cuốn" class="logo-img">

                    <div class="logo-text">
                        <h1>
                            <span class="gradient-text">Phim</span>
                            <span> Cuốn</span>
                        </h1>
                        <p>Cuốn không thể dừng</p>
                    </div>
                </a>

                <div class=" stui-header__side">
                    <form action="/" method="get" class="stui-header__search">


                        <input name="search" type="text" id="wd" name="s" class="sin form-control"
                            autocomplete="off" placeholder="Tìm kiếm phim...">

                        <div id="result"></div>

                    </form>
                </div>
                <ul class=" stui-header__menu type-slide">
                    @foreach ($menu as $item)
                        @if (count($item['children']))
                            <li class="nav-menu-item dropdown has-dropdown">
                                <a href="{{ $item['link'] }}" title="{{ $item['name'] }}">
                                    <span class="nav-menu-item-name">{{ $item['name'] }} 
                                       <svg width="18" height="18" viewBox="0 0 24 24">
                        <path d="M6 9l6 6 6-6" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg></span>
                                </a>
                                <ul class="dropdown-menu dropdown-content">
                                    @foreach ($item['children'] as $children)
                                        <li>
                                            <a class="dropdown-item" href="{{ $children['link'] }}"
                                                title="{{ $children['name'] }}">{{ $children['name'] }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @else
                            <li><a href="{{ $item['link'] }}">{{ $item['name'] }}</a></li>
                        @endif
                    @endforeach
                    @auth
                        <li class="bg-22272f" style="color:white; margin-right:15px; 4px;border-radius: 4px;">
                           <svg width="24" height="24" viewBox="0 0 24 24">
                                <circle cx="12" cy="8" r="4" fill="white"/>
                                <path d="M4 20c0-4 4-6 8-6s8 2 8 6" fill="white"/>
                            </svg>
                            <form method="POST" action="/logout" style="display:inline;">
                                @csrf
                                <input type="hidden" name="redirect" value="{{ url()->current() }}">
                                <button type="submit" style="background:none;border:none;color:#3dbb2b;cursor:pointer;">
                                    Đăng xuất
                                </button>
                            </form>
                        </li>
                    @else
                        <li class="openAuthModal bg-22272f" style="padding: 2px 12px;border-radius: 4px;">
                            <a href="#"> Log in / Sign up</a>
                        </li>
                    @endauth
                </ul>
                <div class="flex-centen" id="btnMenu">
                    <svg class="icon-category-cus" width="35" height="35" viewBox="0 0 120 100"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect x="10" y="10" width="100" height="14" rx="7" fill="#fff" />
                        <rect x="10" y="40" width="100" height="14" rx="7" fill="#fff" />
                        <rect x="10" y="70" width="100" height="14" rx="7" fill="#fff" />
                    </svg>
                </div>
            </div>
        </div>
        <!-- giao dien mobile nav -->
        <div class="bx91k menu-box" id="menuBox">
            <div class="srx44p">
                <form action="/" method="get">
                    <svg class="icn88a" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                    <input name="search" type="text" class="ipt77q" id="mobileSearch"
                        placeholder="Tìm kiếm phim...">
                </form>

                <div class="drp55z" id="mobileResult"></div>

            </div>
            <ul class="bx91k2-font-family">
                @foreach ($menu as $item)
                    @if (count($item['children']))
                        <li class="sec66t">
                            <button class="btn33k">
                                <span>{{ $item['name'] }}</span>
                               <svg width="18" height="18" viewBox="0 0 24 24">
                        <path d="M6 9l6 6 6-6" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                            </button>
                            <div class="grd22v">
                                @foreach ($item['children'] as $children)
                                    <a href="{{ $children['link'] }}">
                                        {{ $children['name'] }}
                                    </a>
                                @endforeach
                            </div>
                        </li>
                    @else
                        <li>
                            <a href="{{ $item['link'] }}" class="lnk09p">
                                {{ $item['name'] }}
                            </a>
                        </li>
                    @endif
                @endforeach
                @auth
                    <li style="color:white; margin-right:15px; padding: 3px 8px 4px;">
                        {{ auth()->user()->name }}
                        <form method="POST" action="/logout" style="display:inline;">
                            @csrf
                            <input type="hidden" name="redirect" value="{{ url()->current() }}">
                            <button type="submit" style="background:none;border:none;color:#3dbb2b;cursor:pointer;">
                                Đăng xuất
                            </button>
                        </form>
                    </li>
                @else
                    <li class="openAuthModal" style="padding: 6px 11px 7px;">
                        <a href="#"> Log in / Sign up</a>
                    </li>
                @endauth
            </ul>

        </div>
    </div>


</header>
<div id="authModal"
    style="display:none; position:fixed; inset:0; background:rgba(0,0,0,0.7); z-index:9999; justify-content:center; align-items:center;">
    <div style="background:#1b1f27; padding:30px; border-radius:10px; width:350px; position:relative;">
        <span id="closeModal" style="position:absolute; right:15px; top:10px; cursor:pointer; color:white;">✕</span>

        <h3 style="color:white; margin-bottom:20px;">Đăng nhập</h3>

        <form method="POST" action="/login">
            @csrf
            <input type="hidden" name="redirect" value="{{ url()->current() }}">
            @if ($errors->any())
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        document.getElementById('authModal').style.display = 'flex';
                    });
                </script>
                <div style="color:#ff6b6b; margin-bottom:10px;">
                    {{ $errors->first() }}
                </div>
            @endif

            <input type="email" name="email" placeholder="Email" required
                style="width:100%;margin-bottom:10px;padding:8px;">

            <input type="password" name="password" placeholder="Mật khẩu" required
                style="width:100%;margin-bottom:15px;padding:8px;">

            <button type="submit"
                style="width:100%;background:#3dbb2b;color:white;padding:10px;border:none;border-radius:6px;cursor:pointer">
                Đăng nhập
            </button>
        </form>

        <hr style="margin:20px 0;">

        <h4 style="color:white;">Chưa có tài khoản?</h4>

        <form method="POST" action="/register">
            @csrf
            <input type="hidden" name="redirect" value="{{ url()->current() }}">
            <input type="text" name="name" placeholder="Tên" required
                style="width:100%;margin-bottom:10px;padding:8px;">
            <input type="email" name="email" placeholder="Email" required
                style="width:100%;margin-bottom:10px;padding:8px;">
            <input type="password" name="password" placeholder="Mật khẩu" required
                style="width:100%;margin-bottom:15px;padding:8px;">
            <button type="submit"
                style="width:100%;background:#6366f1;color:white;padding:10px;border:none;border-radius:6px;cursor:pointer">
                Đăng ký
            </button>
        </form>

    </div>
</div>
<script>
    const btn = document.getElementById("btnMenu");
    const menu = document.getElementById("menuBox");

    btn.addEventListener("click", function() {
        menu.classList.toggle("show");
    });

    document.addEventListener("click", function(e) {
        if (!btn.contains(e.target) && !menu.contains(e.target)) {
            menu.classList.remove("show");
        }
    });
    document.querySelectorAll('.btn33k').forEach(function(btn) {

        btn.addEventListener('click', function() {

            let currentMenu = this.nextElementSibling;

            // Đóng tất cả menu khác
            document.querySelectorAll('.grd22v').forEach(function(menu) {
                if (menu !== currentMenu) {
                    menu.classList.remove('active');
                }
            });

            // Toggle menu hiện tại
            currentMenu.classList.toggle('active');
        });
    });



    function liveSearch(inputSelector, resultSelector) {

        let typingTimer;
        let delay = 400;

        $(inputSelector).on('keyup', function() {

            clearTimeout(typingTimer);
            let value = $(this).val().trim();
            let resultBox = $(resultSelector);

            if (!value) {
                resultBox.html('').removeClass('show');
                return;
            }

            typingTimer = setTimeout(function() {

                $.ajax({
                    type: 'get',
                    url: '{{ url('search') }}',
                    data: {
                        search: value
                    },

                    success: function(data) {

                        resultBox.html('');

                        if (data.length > 0) {

                            $.each(data, function(key, value) {

                                resultBox.append(
                                    '<a href="' + value.slug +
                                    '" class="rowsearch">' +
                                    '<div class="column left">' +
                                    '<img src="' + value.image +
                                    '" width="50"/>' +
                                    '</div>' +
                                    '<div class="column right">' +
                                    '<p>' + value.title + '</p>' +
                                    '<p>' + value.original_title + ' | ' + value
                                    .year + '</p>' +
                                    '</div>' +
                                    '</a>'
                                );
                            });

                            resultBox.addClass('show');
                        } else {
                            resultBox.removeClass('show');
                        }
                    }
                });
            }, delay);
        });

        // Click ngoài thì ẩn
        $(document).on('click', function(e) {
            if (!$(e.target).closest(inputSelector + ',' + resultSelector).length) {
                $(resultSelector).html('').removeClass('show');
            }
        });
    }
    // GỌI CHUNG
    liveSearch('#wd', '#result');
    liveSearch('#mobileSearch', '#mobileResult'); // mobile
</script>





<script>
    document.addEventListener('click', function(e) {

        const modal = document.getElementById('authModal');

        // ✅ MỞ MODAL
        if (e.target.closest('.openAuthModal')) {
            e.preventDefault();
            if (modal) {
                modal.style.display = 'flex';
                document.body.style.overflow = 'hidden';
            }
        }

        // ✅ ĐÓNG khi bấm nút X
        if (e.target.id === 'closeModal') {
            modal.style.display = 'none';
            document.body.style.overflow = 'auto';
        }

        // ✅ ĐÓNG khi bấm ra nền tối
        if (e.target === modal) {
            modal.style.display = 'none';
            document.body.style.overflow = 'auto';
        }

    });
</script>


<script>
    window.addEventListener("scroll", function() {
        const header = document.querySelector(".stui-header__top");

        if (window.scrollY > 50) {
            header.classList.add("scrolled");
        } else {
            header.classList.remove("scrolled");
        }
    });
</script>
