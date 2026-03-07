
<style> 
/* =========================
   SWIPER WRAPPER
========================= */
.swiper {
    position: relative;
    
    overflow: visible;
}
.stui-pannel_hd .swiper-wrapper{
    height: auto;
}
/* =========================
   NAV BUTTONS
========================= */
.swiper-button-next,
.swiper-button-prev {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    z-index: 20;

    width: 45px;
    height: 45px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: rgba(23, 26, 32, 0.9);
    border-radius: 50%;
    cursor: pointer;

    color: #ff9f1a !important;
    transition: all 0.3s ease;
}

/* Ẩn icon mặc định của Swiper */
.swiper-button-next::after,
.swiper-button-prev::after {
    /* display: none; */
}

/* =========================
   POSITION
========================= */
.swiper-button-prev {
    left: 10px;
}

.swiper-button-next {
    right: 10px;
}
.swiper-button-next,
.swiper-button-prev {
    background: transparent;
    border-radius: 0px;
}
/* =========================
   HOVER EFFECT
========================= */
.swiper-button-next:hover,
.swiper-button-prev:hover {
     /* background: #ff9f1a; */
    color: #ff9f1a !important;
    transform: translateY(-50%) scale(1.1);
    font-size: 36px;
}

/* =========================
   ICON STYLE
========================= */
.icon-style-left-right {
    font-size: 22px;
    font-weight: bold;
}

.icon-left {
    transform: rotate(-90deg);
}

/* =========================
   OPTIONAL: ẨN NÚT KHI KHÔNG HOVER
========================= */
.swiper-button-next,
.swiper-button-prev {
    opacity: 0;
}

.swiper:hover .swiper-button-next,
.swiper:hover .swiper-button-prev {
    opacity: 1;
}

/* =========================
   MOBILE FIX
========================= */
@media (max-width: 768px) {

    .swiper {
        /* padding: 0 35px; */
    }

    .swiper-button-next,
    .swiper-button-prev {
        width: 35px;
        height: 35px;
    }

    .swiper-button-prev {
        left: 5px;
    }

    .swiper-button-next {
        right: 5px;
    }
}
/* Ẩn nút khi bị disable */
.swiper-button-disabled {
    opacity: 0 !important;
    pointer-events: none;
}
</style>



<div class="stui-pannel-box clearfix">
     <div class="stui-pannel_hd">
                <div class="stui-pannel__head clearfix"><a class="more text-muted pull-right"
                        href="{{ $item['link'] }}"  aria-label="Xem tất cả phim mới cập nhật" >Xem thêm ></a>
                    <h2 class="title"><img src="{{ asset('/themes/rrdyw/statics/icon/icon_1.png') }}" alt="title phim moi le moi j"><a
                            href="{{ $item['link'] }}">{{ $item['label'] }}</a></h2>
                </div>
            </div>
    <div class="swiper mySwiper stui-pannel_hd">
  <div class="swiper-wrapper">
    @foreach ($item['data'] as $movie)
      <div class="swiper-slide">
         @include('themes::themerrdyw.inc.section.movie_card')
      </div>
    @endforeach
  </div>
  <div class="swiper-button-next">
      {{-- <i class="icon iconfont icon-more icon-style-left-right"></i> --}}
  </div>
  <div class="swiper-button-prev">
         {{-- <i class="icon iconfont icon-less icon-left icon-style-left-right"></i> --}}

  </div>
</div>
</div>
<script>
    new Swiper(".mySwiper", {
  slidesPerView: 5,
  spaceBetween: 10,
  slidesPerGroup: 2,
  loop: false, // QUAN TRỌNG
  watchOverflow: true, // QUAN TRỌNG
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  breakpoints: {
    320: { slidesPerView: 3 },
    768: { slidesPerView: 4 },
    // 992: { slidesPerView: 4 },
    1024: { slidesPerView: 6 },
  },
});
</script>

