<!DOCTYPE html>
<html lang="en">
@extends('themes::themerrdyw.layout')
@php
    $watch_url = '';
    if (!$currentMovie->is_copyright && count($currentMovie->episodes) && $currentMovie->episodes[0]['link'] != '') {
        $watch_url = $currentMovie->episodes
            ->sortBy([['server', 'asc']])
            ->groupBy('server')
            ->first()
            ->sortByDesc('name', SORT_NATURAL)
            ->groupBy('name')
            ->last()
            ->sortByDesc('type')
            ->first()
            ->getUrl();
    }
  @endphp

@php
    preg_match('/\d+/', $currentMovie->episode_current, $current);
    preg_match('/\d+/', $currentMovie->episode_total, $total);

    $currentEpisode = $current[0] ?? 0;
    $totalEpisode = $total[0] ?? '?';
@endphp


<style>
.stui-content__detail .data {
    display: grid;
    grid-template-columns: 95px 1fr;
    margin-bottom: 6px;
}

.stui-content__detail .data span {
    color: #10b77f;
}

.movie-wrapper {
  max-width: 1200px;
  margin: 40px auto;
  padding: 20px;
}
#movies-rating-star-sidebar img{
    width: 10px !important;
    height: 10px !important;
}
.movie-grid {
  display: grid;
  grid-template-columns: 2fr 1fr;
  gap: 20px;
}

.movie-main,
.movie-sidebar {
  background: rgba(255, 255, 255, 0.05);
  border: 1px solid rgba(255, 255, 255, 0.1);
  padding: 20px;
  border-radius: 12px;
}

.movie-info {
  display: flex;
  flex-wrap: wrap;
  gap: 10px 20px;
  margin-bottom: 20px;
}

.info-item {
  color: #f3f4f6;

}

.info-item span {
color: #10b77f;
  margin-right: 5px;
}

.movie-description h3 {
    color: #10b77f;
  margin-bottom: 10px;
}

.movie-description p {
  color: #f3f4f6;
  line-height: 1.6;
}

.btn-primary {
  display: block;
  text-align: center;
  padding: 10px;
  background: #6366f1;
  color: #111827 !important;
  text-decoration: none;
  border-radius: 8px;
  margin-bottom: 15px;
  transition: 0.3s;
}

.btn-primary:hover {
  background: #4f46e5;
}

.button-group {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 10px;
  margin-bottom: 20px;
}

.button-group button {
  padding: 8px;
  border-radius: 6px;
  border: 1px solid rgba(255, 255, 255, 0.2);
  background: transparent;
  color: #f3f4f6 ;
  cursor: pointer;
  transition: 0.3s;
}

.button-group button:hover {
  background: rgba(255, 255, 255, 0.1);
}

.movie-stats div {
  display: flex;
  justify-content: space-between;
  margin-bottom: 8px;
    color: #f3f4f6 ;
}

.movie-stats span {
   color: #10b77f ;
}

/* Responsive */
@media (max-width: 768px) {
  .movie-grid {
    grid-template-columns: 1fr;
  }
}


    .stui-pannel-box-bg {
        position: relative;
        background-image: url('{{ $currentMovie->getPosterUrl() }}');
        background-size: cover;
        background-position: center;
    }
    #movies-rating-msg{
        color: red;
    }
    .stui-pannel-box-bg::before {
        content: "";
        position: absolute;
        inset: 0;
        background: linear-gradient(to right,
                rgba(0, 0, 0, 0.75),
                rgba(0, 0, 0, 0.4));
        display: block !important;

    }

    .stui-pannel-box-bg>* {
        position: relative;
        z-index: 2;
    }

    .detail-sketch {
        color: #e7ebef;
    }
</style>

@section('content')
<div class="container">
    <div class="row">
        @if ($currentMovie->notify || $currentMovie->showtimes)
            <div class="stui-pannel stui-pannel-bg clearfix">
                <div class="stui-pannel-box clearfix">
                    <div class="stui-pannel_hd">
                        @if ($currentMovie->showtimes)
                            <p><strong>Lịch chiếu : </strong> {{ $currentMovie->showtimes }}</p>
                        @endif
                        @if ($currentMovie->notify)
                            <p><strong>Thông báo : </strong> {{ $currentMovie->notify }}</p>
                        @endif
                    </div>
                </div>
            </div>
        @endif
        <div class="stui-pannel stui-pannel-bg clearfix">
            <div class="stui-pannel-box clearfix stui-pannel-box-bg">
                <div class="stui-pannel_bd clearfix">
                    <div class="col-md-wide-75 col-xs-1">
                        <div class="stui-content clearfix">
                            <div class="stui-content__thumb"><a class="stui-vodlist__thumb v-thumb lazyload"
                                    href="{{ $watch_url }}" title="{{ $currentMovie->name }}"
                                    data-original="{{ $currentMovie->getThumbUrl() }}"
                                    style="background-image: url({{ $currentMovie->getThumbUrl() }});"><span
                                        class="play active hidden-xs"></span><span
                                        class="pic-text text-right">{{ $currentMovie->getStatus() }}</span></a></div>
                            <div class="stui-content__detail">
                                <h2 class="title">{{ $currentMovie->name }}</h2>
                                <p class="data detail-sketch"><span class="text-muted">Năm
                                        ：</span>{{ $currentMovie->publish_year }}</p>
                                <p class="data"><span class="text-muted">Đạo diễn ：</span>{!! $currentMovie->directors->map(function ($director) {
                                        return '<a href="' . $director->getUrl() . '" title="' . $director->name . '">' . $director->name . '</a>';
                                    })->implode(', ') !!}
                                </p>

                                <p class="data"><span class="text-muted">Quốc gia：</span> {!! $currentMovie->regions->map(function ($region) {
                                        return '<a href="' . $region->getUrl() . '" title="' . $region->name . '">' . $region->name . '</a>';
                                    })->implode(', ') !!}</p>
                                <p class="data detail-sketch"><span class="text-muted">Thời lượng ：</span>
                                    {{ $currentMovie->episode_time }}</p>
                                     <p class="data" style="display:block;"><span class="text-muted">Diễn viên：</span>{!! $currentMovie->actors->map(function ($director) {
                                        return '<a href="' . $director->getUrl() . '" title="' . $director->name . '">' . $director->name . '</a>';
                                    })->implode(', ') !!}</p>
                                <div class="play-btn clearfix">
                                    @if ($watch_url)
                                        <a class="btn btn-primary" href="{{ $watch_url }}">Xem phim</a>
                                    @endif

                                    @if ($currentMovie->trailer_url && strpos($currentMovie->trailer_url, 'youtube'))
                                        @php
                                            parse_str(
                                                parse_url($currentMovie->trailer_url, PHP_URL_QUERY),
                                                $my_array_of_vars,
                                            );
                                            $video_id = $my_array_of_vars['v'] ?? null;
                                        @endphp

                                        <a class="btn btn-primary fancybox fancybox.iframe"
                                            href="https://www.youtube.com/embed/{{ $video_id }}">Trailer</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-wide-25 hidden-md hidden-sm hidden-xs">
                        <div class="text-center" style="padding: 15px;margin-top: 50px">
                            <div class="rating-content">
                                <div id="movies-rating-star" style="height: 18px;"></div>
                                <div class='detail-sketch' style="margin-top: 5px">
                                    ({{ $currentMovie->getRatingStar() }}
                                    sao
                                    /
                                    {{ $currentMovie->getRatingCount() }} đánh giá)
                                </div>
                                <div id="movies-rating-msg"></div>
                            </div>
                            <div style="margin-top: 20px">
                                <p class="font-12 detail-sketch">Đánh giá</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- thông tin phim  --}}
        <div class="stui-pannel stui-pannel-bg clearfix">
            <div class="movie-wrapper">
            <div class="movie-grid">
                <!-- LEFT CONTENT -->
                <div class="movie-main">
                <div class="movie-info">
                    <div class="info-item"><span>Thể loại:</span>
                         {!! $currentMovie->categories->map(function ($category) {
                        return '<a alt="the loại" href="'.$category->getUrl().'" title="'.$category->name.'">'.$category->name.'</a>';
                        })->implode(', ') !!}
                    </div>
                    <div class="info-item"><span>Đang phát:</span>{{ $currentEpisode }}/{{ $totalEpisode }} Tập</div>
                    <div class="info-item"><span>Cập Nhập:</span> 
                         {{ \Carbon\Carbon::parse($currentMovie->updated_at)->format('d/m/Y') }}
                    </div>
                    <div class="info-item"><span>Phụ đề:</span> {{ $currentMovie->language }}</div>
                    <div class="info-item"><span>Trạng thái:</span>
                         @switch($currentMovie->status)
                            @case('ongoing')
                                Đang chiếu
                                @break

                            @case('completed')
                                Hoàn thành
                                @break
                            @case('trailer')
                                Trailer
                                @break
                            @default
                                {{ $currentMovie->status }}
                        @endswitch
                    </div>
                </div>

                <div class="movie-description">
                    <h3>Nội dung phim</h3>
                    <p>{!! strip_tags($currentMovie->content) !!}</p>
                </div>

                </div>

                <!-- RIGHT SIDEBAR -->
                <div class="movie-sidebar">

                <a href="{{ $watch_url }}" class="btn-primary">▶ Xem Phim</a>

                <div class="button-group">
                    <button>👁 {{ number_format($currentMovie->view_day) }}</button>
                    <button>📅 {{ number_format($currentMovie->view_week) }}</button>
                    <button>🗓 {{ number_format($currentMovie->view_month) }}</button>
                </div>
                @php
                    $rating = $currentMovie->getRatingStar(); // ví dụ 8.4
                    $star = round($rating); // đổi từ thang 10 -> 5 sao
                @endphp
                <div class="movie-stats">
                    <div><span>Lượt xem:</span> {{ $currentMovie->view_total }}</div>
                    <div><span>Đánh giá:</span>
                        <div id="movies-rating-star-sidebar"></div>
                    </div>
                    <div><span>Chất lượng:</span> <strong>{{ $currentMovie->quality }}</strong></div>
                </div>

                </div>

            </div>
            </div>
        </div>
        {{-- bình luận phim --}}
        <div class="stui-pannel stui-pannel-bg clearfix">
            <div class="stui-pannel-box">
                <div class="stui-pannel_hd">
                    <div class="stui-pannel__head bottom-line active clearfix">
                        <h3 class="title"><img src="{{ asset('/themes/rrdyw/statics/icon/icon_23.png') }}"
                                alt="404">Bình luận</h3>
                    </div>
                </div>
                @include('themes::themerrdyw.comment', ['movie' => $currentMovie])
                <div class="stui-pannel_bd col-pd clearfix">
                    <div style="width: 100%; background-color: #fff;margin-top: 10px">
                        <div class="fb-comments w-full" data-href="{{ $currentMovie->getUrl() }}" data-width="100%"
                            data-numposts="5" data-colorscheme="light" data-lazy="true">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- danh sách phim liên quan --}}
        <div class="stui-pannel stui-pannel-bg clearfix">
            <div class="stui-pannel-box">
                <div class="stui-pannel_hd">
                    <div class="stui-pannel__head clearfix">
                        <h3 class="title">
                            <img src="{{ asset('/themes/rrdyw/statics/icon/icon_6.png') }}" alt="danh sách phim lien quan">Có thể bạn thích
                        </h3>
                    </div>
                </div>
                <div class="stui-pannel_bd">
                    <ul class="stui-vodlist__bd clearfix">
                        @foreach ($movie_related as $movie)
                            <li class="col-md-6 col-sm-4 col-xs-2">
                                @include('themes::themerrdyw.inc.section.movie_card')
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="{{ asset('/themes/rrdyw/plugins/jquery-raty/jquery.raty.js') }}"></script>
        <link href="{{ asset('/themes/rrdyw/plugins/jquery-raty/jquery.raty.css') }}" rel="stylesheet" type="text/css" />
        <script>
            var rated = false;
            $('#movies-rating-star').raty({
                score: {{ $currentMovie->getRatingStar() }},
                number: 10,
                numberMax: 10,
                hints: ['quá tệ', 'tệ', 'không hay', 'không hay lắm', 'bình thường', 'xem được', 'có vẻ hay', 'hay',
                    'rất hay', 'siêu phẩm'
                ],
                starOff: '{{ asset('/themes/rrdyw/plugins/jquery-raty/images/star-off.png') }}',
                starOn: '{{ asset('/themes/rrdyw/plugins/jquery-raty/images/star-on.png') }}',
                starHalf: '{{ asset('/themes/rrdyw/plugins/jquery-raty/images/star-half.png') }}',
                click: function(score, evt) {
                    if (rated) return
                    fetch("{{ route('movie.rating', ['movie' => $currentMovie->slug]) }}", {
                        method: 'POST',
                        headers: {
                            "Content-Type": "application/json",
                            'X-CSRF-TOKEN': document.querySelector(
                                    'meta[name="csrf-token"]')
                                .getAttribute(
                                    'content')
                        },
                        body: JSON.stringify({
                            rating: score
                        })
                    });
                    rated = true;
                    $('#movies-rating-star').data('raty').readOnly(true);
                    $('#movies-rating-msg').html(`Bạn đã đánh giá ${score} sao cho phim này!`);
                }
            });
            $('#movies-rating-star-sidebar').raty({
                score: {{ $currentMovie->getRatingStar() }},
                number: 10,
                numberMax: 10,
                // readOnly: true, // chỉ hiển thị, không cho click
                starOff: '{{ asset('/themes/rrdyw/plugins/jquery-raty/images/star-off.png') }}',
                starOn: '{{ asset('/themes/rrdyw/plugins/jquery-raty/images/star-on.png') }}',
                starHalf: '{{ asset('/themes/rrdyw/plugins/jquery-raty/images/star-half.png') }}',
                click: function(score) {
                    fetch("{{ route('movie.rating', ['movie' => $currentMovie->slug]) }}", {
                        method: 'POST',
                        headers: {
                            "Content-Type": "application/json",
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({
                            rating: score
                        })
                    });
                }
            });
        </script>
        <script src="{{ asset('/themes/rrdyw/source/jquery.fancybox.pack.js?v=2.1.5') }}"></script>
        <link rel="stylesheet" type="text/css" href="{{ asset('/themes/rrdyw/source/jquery.fancybox.css?v=2.1.5') }}"
            media="screen" />
        <script type="text/javascript">
            $(document).ready(function() {
                $(".fancybox").fancybox({
                    maxWidth: 800,
                    maxHeight: 600,
                    fitToView: false,
                    width: '70%',
                    height: '70%',
                    autoSize: false,
                    closeClick: false,
                    openEffect: 'none',
                    closeEffect: 'none'
                });
            });
        </script>

        {!! setting('site_scripts_facebook_sdk') !!}
    @endpush
</div>
@endsection
