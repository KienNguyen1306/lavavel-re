<!DOCTYPE html>
@extends('themes::layout')
@php
    $menu = \Ophim\Core\Models\Menu::getTree();
    $tops = Cache::remember('site.movies.tops', setting('site_cache_ttl', 5 * 60), function () {
        $lists = preg_split('/[\n\r]+/', get_theme_option('hotest'));
        $data = [];
        foreach ($lists as $list) {
            if (trim($list)) {
                $list = explode('|', $list);
                [$label, $relation, $field, $val, $sortKey, $alg, $limit, $template] = array_merge($list, [
                    'Phim hot',
                    '',
                    'type',
                    'series',
                    'view_total',
                    'desc',
                    4,
                    'top_thumb',
                ]);
                try {
                    $data[] = [
                        'label' => $label,
                        'template' => $template,
                        'data' => \Ophim\Core\Models\Movie::when($relation, function ($query) use (
                            $relation,
                            $field,
                            $val,
                        ) {
                            $query->whereHas($relation, function ($rel) use ($field, $val) {
                                $rel->where($field, $val);
                            });
                        })
                            ->when(!$relation, function ($query) use ($field, $val) {
                                $query->where($field, $val);
                            })
                            ->orderBy($sortKey, $alg)
                            ->limit($limit)
                            ->get(),
                    ];
                } catch (\Exception $e) {
                    # code
                }
            }
        }
        return $data;
    });
@endphp

@push('header')
 {{-- slider --}}
    <link rel="stylesheet" href="{{ asset('/themes/rrdyw/statics/css/main-slider.css') }}" type="text/css">
    
 
 
     {{-- icon --}}
   <link rel="preload" href="{{ asset('/themes/rrdyw/statics/font/iconfont.css?v=74') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
    <link rel="stylesheet" href="{{ asset('/themes/rrdyw/statics/font/iconfont.css?v=74') }}">
    </noscript>

    {{-- css dèaut --}}
    <link rel="stylesheet" href="{{ asset('/themes/rrdyw/statics/css/stui_block.css?v=74') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/themes/rrdyw/statics/css/stui_default.css?v=74') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/themes/rrdyw/statics/css/stui_custom.css?v=74') }}" type="text/css">
    
     {{-- gg font --}}
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
    
     {{-- jquery --}}
    <script type="text/javascript" src="{{ asset('/themes/rrdyw/statics/js/jquery.min.js') }}"  ></script>
    <script type="text/javascript" src="{{ asset('/themes/rrdyw/statics/js/stui_default.js') }}"  ></script>
    <script>
        var SitePath = '{{ asset('/themes/rrdyw') }}/',
            SiteAid = '10',
            SiteTid = '',
            SiteId = '';
    </script>
@endpush

@section('body')
<main id="main-content">
    @include('themes::themerrdyw.inc.nav')
    @if (get_theme_option('ads_header'))
        {!! get_theme_option('ads_header') !!}
    @endif

@if (!request()->is('/'))
    <div class="container">
        <div class="hero">
            <p class="hero-subtitle" style="color: #ff9900;">
                Xem Phim Miễn Phí Cực Nhanh, Chất Lượng Cao Và Cập Nhật Liên Tục
            </p>
            <h1 class="hero-title">
                <span class="brand">Phim Cuốn</span>
                Xem Phim Mới HD – Phim Cuốn Từng Phút
            </h1>
        </div>
    </div>
@endif
    @yield('content')
     </main>
     
@endsection

@section('footer')
    <div class="container container-ft">
        {!! get_theme_option('footer') !!}
        @if (get_theme_option('ads_catfish'))
            {!! get_theme_option('ads_catfish') !!}
        @endif
        {!! setting('site_scripts_google_analytics') !!}
    </div>
      {{-- SWIPER JS --}}
   
@endsection
<script type="text/javascript" src="{{ asset('/themes/rrdyw/statics/js/main-slider.js') }}" ></script>
 