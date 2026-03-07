<div class="stui-pannel-box clearfix">
     <div class="stui-pannel_hd">
                <div class="stui-pannel__head clearfix"><a class="more text-muted pull-right"
                        href="{{ $item['link'] }}"  aria-label="Xem tất cả phim mới cập nhật">Xem thêm ></a>
                    <h2 class="title"><img src="{{ asset('/themes/rrdyw/statics/icon/icon_1.png') }}" alt="title phim moi le"><a
                            href="{{ $item['link'] }}">{{ $item['label'] }}</a></h2>
                </div>
            </div>
    <div class="stui-pannel_bd">
        <ul class="stui-vodlist__bd clearfix">
            @foreach ($item['data'] as $movie)
                <li class="col-md-6 col-sm-4 col-xs-3">
                    @include('themes::themerrdyw.inc.section.movie_card')
                </li>
            @endforeach
        </ul>
    </div>
</div>
