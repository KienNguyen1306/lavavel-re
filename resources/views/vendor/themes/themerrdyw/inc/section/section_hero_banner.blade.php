<style>
 .hero-section {
    height: 90vh;
    position: relative;
    margin-bottom: 20px;
    overflow: hidden;
}

.box_hero-caterogy{
    display: flex;
    align-items: center;
    gap: 8px;
}
.hero-sub:hover{
    color: #ffd875;
}
.hero-content a:hover{
    color: inherit;
}
.hero-caterogy{
    margin-bottom: 10px;
        background-color: rgba(255, 255, 255, 0.063);
    color: rgb(255, 255, 255);
    display: inline-flex;
    padding: 4px 8px;
    font-size: 14px;
    border-radius: 5px;
}
.hero-caterogy:hover{
color: #ffd875;
}
.hero-section::after {
    content: "";
    position: absolute;
    left: 0;
    bottom: 0;
    width: 100%;
    height: 220px;
    background: linear-gradient(
        to bottom,
        rgba(14, 17, 21, 0) 0%,
        rgba(14, 17, 21, 0.6) 50%,
        rgba(14, 17, 21, 1.2) 100%
    );
    pointer-events: none;
    z-index: 2;
}
.hero-sub{
       font-family: "Segoe UI", Arial, sans-serif;

}
.hero-desc{
    color: #ffd875
}
.hero-content h1{
        font-family:'Great Vibes', cursive;
    }
    .sub_hero{

    }
.hero-slide {
    height: 90vh;
    background-size: cover;
    background-position: center;
    position: relative;
}

.hero-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(
        to right,
        rgba(0,0,0,.85) 0%,
        rgba(0,0,0,.6) 40%,
        rgba(0,0,0,.3) 60%,
        transparent 100%
    );
}

.hero-content {
    position: absolute;
    top: 50%;
    left: 8%;
    transform: translateY(-50%);
    max-width: 550px;
    color: #fff;
    z-index: 2;
}

.hero-content h1 {
    font-size: 48px;
    font-weight: 700;
    line-height: 1.2;
}

.hero-sub {
    line-height: 1.6;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
.hero-meta{
    margin-bottom: 10px
}
.hero-meta span {
    margin-right: 10px;
    background: rgba(255,255,255,.1);
    padding: 4px 8px;
    border-radius: 4px;
    font-size: 14px;
    cursor: default;
}

.btn-play {
    display: inline-block;
    margin-top: 20px;
    background: #ff4c4c;
    padding: 12px 25px;
    border-radius: 50px;
    color: #fff;
}

/* ===== THUMBS ===== */
.heroThumbs {
    position: absolute;
    right: 40px;
    bottom: 50px;
    width: 300px;
    overflow: hidden;
    z-index: 5;
}
.swiper{
    overflow: hidden;
}
.heroThumbs .swiper-slide {
    width: 70px !important;
    height: 40px;
    border-radius: 10px;
    overflow: hidden;
    opacity: .5;
    cursor: pointer;
    transition: .3s;
}

.heroThumbs .swiper-slide-thumb-active {
    opacity: 1;
    border: 2px solid #fff;
}

.heroThumbs img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* ======================= */
/* ===== TABLET ===== */
/* ======================= */
@media (max-width: 1024px) {
    .hero-content h1 {
        font-size: 32px;
    }

    .heroThumbs {
        width: 220px;
    }
}

/* ======================= */
/* ===== MOBILE ===== */
/* ======================= */
@media (max-width: 768px) {

    .hero-section,
    .hero-slide {
        height: 60vh;
    }

    .hero-content {
        left: 5%;
        max-width: 90%;
    }

    .hero-content h1 {
        font-size: 22px;
    }

    .hero-sub {
        display: none;
    }

    .hero-meta span {
        font-size: 12px;
    }

    .btn-play {
        padding: 8px 16px;
        font-size: 14px;
    }

    .heroThumbs {
        bottom: 50px;
        right: 10px;
        width: 180px;
    }

    .heroThumbs .swiper-slide {
        width: 40px !important;
        height: 30px;
    }
}

@media (max-width: 414px) {
    .hero-section::after {
    background: linear-gradient(
        to bottom,
        rgba(23, 26, 32, 0) 0%,
        rgba(23, 26, 32, 0.6) 50%,
        rgba(23, 26, 32, 1.2) 100%
    );
   
}
.hero-section{
    margin-bottom: 0;
}
    .hero-link{
    display: flex;
    flex-direction: column;
    align-items: center
}
    .btn-play{
        display: none;
    }
    .hero-content{
        width: 100%;
    }
    .hero-content{
        left: 50%;
        transform: translate(-50%, -50%)
    }
    .hero-section,
    .hero-slide {
        height: 50vh;
    }
    .heroThumbs{
        left: 50%;
    transform: translateX(-50%);
    width: 95%;
    bottom: 40px;
    }
    .heroThumbs .swiper-slide {
        width: 30px !important;
        height: 30px;
        border-radius: 50%;
    }
    .hero-content{
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .hero-content h1{
        display: flex;
        align-items: center;
        text-align: center
    }
    .btn-play{
        margin-top: 0
    }
    
    .hero-content{
        top: 60%
    }
}
</style>

<div class="hero-section">
    <div class="swiper heroSwiper">
        <div class="swiper-wrapper">
            @foreach($item['data'] as $movie)
         
           <div class="swiper-slide hero-slide"
                 style="background-image:url('{{ $movie->getPosterUrl() }}?v={{ strtotime($movie->updated_at) }}')">
            <a href="{{ $movie->getUrl() }}" class="hero-link"  aria-label="{{$movie['origin_name']}}">
                <div class="hero-overlay"></div>

                <div class="hero-content">
                    <h1>{{ $movie['name'] }}</h1>
                    <p class="hero-desc">
                        {{ Str::limit($movie['origin_name'],150) }}
                    </p>
                    <div class="hero-meta">
                        <span style="color: hsl(45 100% 55%);background-color: hsl(145 20% 25% / 0.5);"> ⭐ {{ $movie['rating_star'] }}</span>
                        <span>{{ $movie['publish_year'] }}</span>
                        <span style="color: hsl(145 60% 45%);background-color: hsl(145 20% 25% / 1.2);">{{ $movie['quality'] ?? 'HD' }}</span>
                        <span style="color: hsl(280 60% 55%);background-color: hsl(280 60% 55% / .2);">{{ $movie['episode_current'] }}</span>
                    </div>
                    <div class="box_hero-caterogy">
                    @foreach($movie->getCategoryList()->take(3) as $cat)
                        <a href="{{ $cat->getUrl() }}" class="hero-caterogy" alt='{{ $cat->name }}'>{{ $cat->name }}</a>
                    @endforeach
                    </div>
                    
                    
                    <p class="hero-sub"> {!! strip_tags($movie['content']) !!}</p>
                    @if($movie->status !== 'trailer')
                        <a href="{{ $movie->getFirstEpisodeUrl() }}" class="btn-play">
                            ▶ Xem ngay
                        </a>
                    @endif
                </div>
            </a>
            </div>
            @endforeach

        </div>
    </div>
    <div class="swiper heroThumbs">
    <div class="swiper-wrapper">
        @foreach($item['data'] as $movie)
        <div class="swiper-slide">
            <img src="{{ $movie->getThumbUrl() }}?v={{ strtotime($movie->updated_at) }}" alt="{{$movie['origin_name']}}" loading="lazy" />
        </div>
        @endforeach
    </div>
</div>
</div>

<script>
  
var thumbs = new Swiper(".heroThumbs", {
    slidesPerView: 4,
    spaceBetween: 10,
    centeredSlides: true,
    centeredSlidesBounds: true,
    slideToClickedSlide: true,
    watchSlidesProgress: true,
    loop: true,
});

var hero = new Swiper(".heroSwiper", {
    effect: "fade",
    fadeEffect: {
        crossFade: true
    },

    loop: true,
    speed: 1000,

    autoplay: {
        delay: 2000,
        disableOnInteraction: false,
    },

    thumbs: {
        swiper: thumbs,
    },

    // QUAN TRỌNG
    loopAdditionalSlides: {{ count($item['data']) }},
    watchSlidesProgress: true,
});
</script>
