@extends('themes::themerrdyw.layout') @section('content')
    <style>
        .video-js .vjs-control-bar {
            background: rgba(0, 0, 0, 0.7) !important;
            height: 40px !important;
        }

        .video-js .vjs-progress-control {
            display: block !important;
            flex: 1 !important;
        }

        .video-js .vjs-progress-holder {
            height: 8px !important;
            background: rgba(255, 255, 255, 0.3) !important;
            margin-top: 16px !important;
        }

        .video-js .vjs-load-progress {
            background: rgba(255, 255, 255, 0.5) !important;
        }

        .video-js .vjs-play-progress {
            background: #ff9900 !important;
        }

        .next-episode-btn {
            position: absolute;
            right: 20px;
            bottom: 80px;
            background: #ff9900;
            padding: 12px 18px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            z-index: 9999;
        }

        .vjs-next-button {
            background: #ff9900;
            padding: 12px 18px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
        }

        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 11px;
            color: #ffffff;
            /* giống text-muted-foreground */
            margin-bottom: 12px;
            overflow-x: auto;
            white-space: nowrap;
            animation: fadeUp 0.4s ease forwards;
        }

        .icon-browse.wat {
            margin-right: 8px;
        }

        .rating-content.watch {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-bottom: 10px;
        }

        .detail-sketch {
            color: #ff9900;
        }

        #movies-rating-msg {
            color: red;
        }

        .breadcrumb-link {
            display: flex;
            align-items: center;
            gap: 4px;
            color: inherit;
            text-decoration: none;
            transition: color 0.2s ease;
            flex-shrink: 0;
        }

        .breadcrumb-link:hover {
            color: #3b82f6;
            /* primary color */
        }

        .breadcrumb-current {
            color: #111827;
            flex-shrink: 0;
        }

        .icon {
            width: 12px;
            height: 12px;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
            flex-shrink: 0;
        }

        /* Responsive giống sm:text-sm */
        @media (min-width: 640px) {
            .breadcrumb {
                font-size: 14px;
                margin-bottom: 16px;
            }

            .icon {
                width: 16px;
                height: 16px;
            }
        }

        /* Animation fade-up */
        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .activeplay {
            background-color: #ff9900;
            color: #111827;
            border: 1px solid #ff9900;
        }

        .active-server {
            background: #d9a0a0 !important;
            color: #fff !important;
        }

        .playactive {
            color: #fff !important;
            background: #c92626 !important;
        }

        .name {
            color: #fff;
        }

        #streaming-sv {
            cursor: pointer !important;
        }

        .stui-player__detail.watc {
            padding: 15px;
            background-color: #0e1115;
            border-radius: 8px;
        }
    </style>

    <div class="container">
        <div class="row">
            @if ($currentMovie->notify || $currentMovie->showtimes)
                <div class="stui-pannel stui-pannel-bg clearfix">
                    <div class="stui-pannel-box clearfix">
                        <div class="stui-pannel_hd">
                            @if ($currentMovie->showtimes)
                                <p><strong>Lịch chiếu : </strong> {{ $currentMovie->showtimes }}</p>
                                @endif @if ($currentMovie->notify)
                                    <p><strong>Thông báo : </strong> {{ $currentMovie->notify }}</p>
                                @endif
                        </div>
                    </div>
                </div>
            @endif
            <div class="breadcrumb">
                <a class="breadcrumb-link" href="/" alt="về trang chủ">
                    <svg class="icon icon-left" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path d="m12 19-7-7 7-7"></path>
                        <path d="M19 12H5"></path>
                    </svg>
                    Trang chủ
                </a>

                <svg class="icon icon-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                    <path d="m9 18 6-6-6-6"></path>
                </svg>

                <a class="breadcrumb-link" href="/phim/{{ $currentMovie->slug }}"
                    alt="{{ $currentMovie->name }}">{{ $currentMovie->name }} </a>
                <svg class="icon icon-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                    <path d="m9 18 6-6-6-6"></path>
                </svg>
                <a class="breadcrumb-link" href="/phim/{{ $currentMovie->slug }}" alt="{{ $episode->name }}">Tập
                    {{ $episode->name }} </a>
            </div>
            <div class="stui-pannel stui-pannel-bg clearfix">
                <div class="stui-pannel-box">
                    <div class="stui-pannel-bd">
                        <div class="stui-player col-pd">
                            <div class="stui-player__video embed-responsive embed-responsive-16by9 clearfix"
                                id="player-wrapper"></div>
                            <div class="stui-player__detail detail watc">
                                <h2 class="title"><a href="{{ $currentMovie->getUrl() }}">{{ $currentMovie->name }}</a> -
                                    Tập {{ $episode->name }}</h2>
                                <div class="rating-content watch" style="margin-top: 10px">
                                    <div id="movies-rating-star" style="height: 18px"></div>
                                    <div class="detail-sketch" style="margin-top: 5px">
                                        ({{ $currentMovie->getRatingStar() }} sao / {{ $currentMovie->getRatingCount() }}
                                        đánh giá)</div>
                                    <div id="movies-rating-msg"></div>
                                </div>
                                <p class="data margin-0">
                                    <a class="detail-more" href=""> 👁 {{ $currentMovie->view_total }} Lượt
                                        Xem <span class="split-line"></span></a>
                                    <span class="text-muted hidden-xs">Quốc gia：</span> {!! $currentMovie->regions->map(function ($region) {
                                            return '<a href="' . $region->getUrl() . '" title="' . $region->name . '">' . $region->name . '</a>';
                                        })->implode(', ') !!} <span
                                        class="split-line"></span><span class="text-muted hidden-xs">Năm ：</span><span
                                        class="name">{{ $currentMovie->publish_year }}</span> <span
                                        class="split-line"></span><a class="detail-more" href="javascript:">Đổi Server ▼ </a>
                                </p>
                                <div class="detail-content" style="display: none; margin-top: 20px">
                                    @foreach ($currentMovie->episodes->where('slug', $episode->slug)->where('server', $episode->server) as $server)
                                        <a onclick="chooseStreamingServer(this)" data-type="{{ $server->type }}"
                                            id="streaming-sv" data-id="{{ $server->id }}"
                                            data-link="{{ $server->link }}" class="streaming-server tag-link"
                                            style="background: #303033; color: #fff; padding: 10px; border-radius: 10px; margin: 5px">
                                            Nguồn #{{ $loop->index + 1 }} </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 播放器-->
            @foreach ($currentMovie->episodes->sortBy([['server', 'asc']])->groupBy('server') as $server => $data)
                <div class="stui-pannel stui-pannel-bg clearfix">
                    <div class="stui-pannel-box">
                        <div class="stui-pannel_hd">
                            <div class="stui-pannel__head bottom-line active clearfix">
                                <h3 class="title"><img src="{{ asset('/themes/rrdyw/statics/icon/icon_1.png') }}"
                                        alt="" />{{ $server }}</h3>
                            </div>
                        </div>
                        <div class="stui-pannel_bd col-pd clearfix">
                            <ul class="stui-content__playlist column10 clearfix">
                                @foreach ($data->sortBy('name', SORT_NATURAL)->groupBy('name') as $name => $item)
                                    <li><a @if ($item->contains($episode)) class="activeplay" @endif
                                            href="{{ $item->sortByDesc('type')->first()->getUrl() }}" target="_self">
                                            {{ $name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="stui-pannel stui-pannel-bg clearfix">
                <div class="stui-pannel-box">
                    <div class="stui-pannel_hd">
                        <div class="stui-pannel__head bottom-line active clearfix">
                            <h3 class="title"><img src="{{ asset('/themes/rrdyw/statics/icon/icon_23.png') }}"
                                    alt="404" />Bình luận</h3>
                        </div>
                    </div>
                    @include('themes::themerrdyw.comment', ['movie' => $currentMovie])

                    <div class="stui-pannel_bd col-pd clearfix">
                        <div style="width: 100%; background-color: #fff; margin-top: 10px">
                            <div class="fb-comments w-full" data-href="{{ $currentMovie->getUrl() }}" data-width="100%"
                                data-numposts="5" data-colorscheme="light" data-lazy="true"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 播放列表-->

            <div class="stui-pannel stui-pannel-bg clearfix">
                <div class="stui-pannel-box">
                    <div class="stui-pannel_hd">
                        <div class="stui-pannel__head clearfix">
                            <h3 class="title"><img src="{{ asset('/themes/rrdyw/statics/icon/icon_6.png') }}"
                                    alt="có the ban thich nó" />Có thể bạn thích</h3>
                        </div>
                    </div>
                    <div class="stui-pannel_bd">
                        <ul class="stui-vodlist__bd clearfix">
                            @foreach ($movie_related as $movie)
                                <li class="col-md-6 col-sm-4 col-xs-3">@include('themes::themerrdyw.inc.section.movie_card')</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <!-- 猜你喜欢-->
        </div>
    </div>
    @endsection @push('scripts')
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
    </script>

    <script src="/themes/rrdyw/player/js/p2p-media-loader-core.min.js"></script>
    <script src="/themes/rrdyw/player/js/p2p-media-loader-hlsjs.min.js"></script>

    <link href="https://vjs.zencdn.net/8.10.0/video-js.css" rel="stylesheet" />
    <script src="https://vjs.zencdn.net/8.10.0/video.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/videojs-contrib-ads@6/dist/videojs.ads.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/videojs-vast-vpaid@2/dist/videojs.vast.vpaid.min.js"></script>
    <script>
        var episode_id = {{ $episode->id }};
        const wrapper = document.getElementById('player-wrapper');
        const vastAds = "{{ Setting::get('jwplayer_advertising_file') }}";


        function chooseStreamingServer(el) {
            const type = el.dataset.type;
            const link = el.dataset.link.replace(/^http:\/\//i, 'https://');
            const id = el.dataset.id;

            const newUrl =
                location.protocol +
                "//" +
                location.host +
                location.pathname.replace(`-${episode_id}`, `-${id}`);

            history.pushState({
                path: newUrl
            }, "", newUrl);
            episode_id = id;


            Array.from(document.getElementsByClassName('streaming-server')).forEach(server => {
                server.classList.remove('active-server');
            })
            el.classList.add('active-server');

            link.replace('http://', 'https://');
            renderPlayer(type, link, id);
        }

        function renderPlayer(type, link, id) {
            if (type == 'embed') {
                if (vastAds) {
                    wrapper.innerHTML = `<div id="fake_jwplayer"></div>`;
                    const fake_player = jwplayer("fake_jwplayer");
                    const objSetupFake = {
                        key: "{{ Setting::get('jwplayer_license') }}",
                        aspectratio: "16:9",
                        width: "100%",
                        file: "/themes/vung/player/1s_blank.mp4",
                        volume: 100,
                        mute: false,
                        autostart: true,
                        advertising: {
                            tag: "{{ Setting::get('jwplayer_advertising_file') }}",
                            client: "vast",
                            vpaidmode: "insecure",
                            skipoffset: {{ (int) Setting::get('jwplayer_advertising_skipoffset') ?: 5 }}, // Bỏ qua quảng cáo trong vòng 5 giây
                            skipmessage: "Bỏ qua sau xx giây",
                            skiptext: "Bỏ qua"
                        }
                    };
                    fake_player.setup(objSetupFake);
                    fake_player.on('complete', function(event) {
                        $("#fake_jwplayer").remove();
                        wrapper.innerHTML = `<iframe width="100%" height="100%" src="${link}" frameborder="0" scrolling="no"
                        allowfullscreen="" allow='autoplay'></iframe>`
                        fake_player.remove();
                    });

                    fake_player.on('adSkipped', function(event) {
                        $("#fake_jwplayer").remove();
                        wrapper.innerHTML = `<iframe width="100%" height="100%" src="${link}" frameborder="0" scrolling="no"
                        allowfullscreen="" allow='autoplay'></iframe>`
                        fake_player.remove();
                    });

                    fake_player.on('adComplete', function(event) {
                        $("#fake_jwplayer").remove();
                        wrapper.innerHTML = `<iframe width="100%" height="100%" src="${link}" frameborder="0" scrolling="no"
                        allowfullscreen="" allow='autoplay'></iframe>`
                        fake_player.remove();
                    });
                } else {
                    if (wrapper) {
                        wrapper.innerHTML = `<iframe width="100%" height="100%" src="${link}" frameborder="0" scrolling="no"
                        allowfullscreen="" allow='autoplay'></iframe>`
                    }
                }
                return;
            }

            if (type == 'm3u8' || type == 'mp4') {

                wrapper.innerHTML = `
    <video
        id="my-player"
        class="video-js vjs-big-play-centered vjs-default-skin"
        controls
        preload="auto"
        style="width:100%;height:100%;"
        poster="{{ $currentMovie->getPosterUrl() }}"
    >
        <source src="${link}" 
            type="${type == 'm3u8' ? 'application/x-mpegURL' : 'video/mp4'}">
    </video>
`;

                var player = videojs('my-player', {
                    controls: true,
                    autoplay: true,
                    preload: 'auto',
                    fluid: true,
                    playbackRates: [0.5, 1, 1.25, 1.5, 2],
                    controlBar: {
                        volumePanel: {
                            inline: false
                        },
                        children: [
                            'playToggle',
                            'progressControl',
                            'currentTimeDisplay',
                            'timeDivider',
                            'durationDisplay',
                            'playbackRateMenuButton',
                            'volumePanel',
                            'fullscreenToggle'
                        ]
                    }
                });

                const resumeData = 'OPCMS-PlayerPosition-' + id;

                player.ready(function() {
                    if (vastAds && vastAds !== "") {

                        player.vastClient({
                            adTagUrl: vastAds,
                            playAdAlways: true,
                            timeout: 5000,
                            adCancelTimeout: 5000
                        });

                    }

                    const Button = videojs.getComponent('Button');

                    class NextButton extends Button {
                        constructor(player, options) {
                            super(player, options);
                            this.controlText('Tập tiếp theo');
                            this.addClass('vjs-next-button');
                            this.el().innerHTML = 'Tập ▶';
                        }

                        handleClick() {
                            const currentEpisode = document.querySelector(
                                '.stui-content__playlist a.activeplay');

                            if (currentEpisode) {
                                const nextLi = currentEpisode.closest('li').nextElementSibling;

                                if (nextLi) {
                                    const nextLink = nextLi.querySelector('a');
                                    if (nextLink) {
                                        window.location.href = nextLink.href;
                                    }
                                }
                            }
                        }
                    }

                    videojs.registerComponent('NextButton', NextButton);
                    player.getChild('controlBar').addChild('NextButton', {});

                    let currentPosition = localStorage.getItem(resumeData);

                    if (currentPosition && currentPosition > 180) {
                        player.currentTime(currentPosition);
                    }

                    player.on('timeupdate', function() {
                        localStorage.setItem(resumeData, player.currentTime());
                        var current = player.currentTime();
                        var duration = player.duration();

                        if (!player.midrollPlayed && current > duration * 0.5) {

                            player.midrollPlayed = true;

                            player.vastClient({
                                adTagUrl: vastAds
                            });

                        }
                    });

                    player.on('ended', function() {
                        localStorage.removeItem(resumeData);
                        const currentEpisode = document.querySelector(
                            '.stui-content__playlist a.activeplay');

                        if (currentEpisode) {
                            const nextLi = currentEpisode.closest('li').nextElementSibling;

                            if (nextLi) {
                                const nextLink = nextLi.querySelector('a');
                                if (nextLink) {
                                    window.location.href = nextLink.href;
                                }
                            }
                        }
                        if (vastAds && vastAds !== "") {
                            player.vastClient({
                                adTagUrl: vastAds
                            });
                        }
                    });

                });

            }
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const episode = '{{ $episode->id }}';
            let playing = document.querySelector(`[data-id="${episode}"]`);
            if (playing) {
                playing.click();
                return;
            }

            const servers = document.getElementsByClassName('streaming-server');
            if (servers[0]) {
                servers[0].click();
            }
        });
    </script>

    {!! setting('site_scripts_facebook_sdk') !!}
@endpush
