<style>
 .stui-pannel_hd {
        background-color: #0e1115;
        padding-bottom: 15px;
 }
 .stui-screen__list li .text-muted{
    margin-right: 15px;
    color: #f9941f;
    padding-top: 0.25rem;
    padding-bottom: 0.25rem;
    padding-left: 0.625rem;
    padding-right: 0.625rem;
    border: 1px solid #f9941f;
        border-radius: 0.25rem;
 }
 .bottom-line-dot:before{
        border-bottom: 1px dotted #2729354d;
 }
 .stui-screen__list li a {
        padding: 4px 12px;
        color: #70788f;
        border-radius: 0.25rem

 }
.stui-screen__list li.active a{
        color: #0d0f16;
 }
 .stui-screen__list li a:hover{
        color: #ffffff;
 }
 .stui-screen__list li a:hover{
        background-color: #21243099;
 }
</style>


<ul class="stui-screen__list type-slide bottom-line-dot clearfix">
    <li><span class="text-muted">Danh mục</span></li>
    <li class="@if (request('types') == 'series') active @endif"><a
            href="/?search={{request('search')}}&regions={{request('regions')}}&categorys={{request('categorys')}}&years={{request('years')}}&sorts={{request('sorts')}}&types=series">Phim
            bộ</a></li>
    <li class="@if (request('types') == 'single') active @endif"><a
            href="/?search={{request('search')}}&regions={{request('regions')}}&categorys={{request('categorys')}}&years={{request('years')}}&sorts={{request('sorts')}}&types=single">Phim
            lẻ</a></li>
</ul>
<ul class="stui-screen__list type-slide bottom-line-dot clearfix">
    <li><span class="text-muted">Thể loại</span></li>
    @foreach (\Ophim\Core\Models\Category::fromCache()->all() as $item)
        <li class="@if (request('categorys') == $item->id) active @endif"><a
                href="/?search={{request('search')}}&regions={{request('regions')}}&years={{request('years')}}&types={{request('types')}}&sorts={{request('sorts')}}&categorys={{$item->id}}">{{ $item->name }}</a>
        </li>
    @endforeach
</ul>
<ul class="stui-screen__list type-slide bottom-line-dot clearfix">
    <li><span class="text-muted">Quốc gia</span></li>
    @foreach (\Ophim\Core\Models\Region::fromCache()->all() as $item)
        <li class=" @if (request('regions') == $item->id) active @endif"><a
                href="/?search={{request('search')}}&regions={{$item->id}}&years={{request('years')}}&types={{request('types')}}&sorts={{request('sorts')}}&categorys={{request('categorys')}}">{{ $item->name }}</a>
        </li>
    @endforeach
</ul>

<ul class="stui-screen__list type-slide bottom-line-dot clearfix">
    <li><span class="text-muted">Năm</span></li>
    @foreach ($years as $year)
        <li class=" @if (request('years') == $year) active @endif"><a
                href="/?search={{request('search')}}&regions={{request('regions')}}&categorys={{request('categorys')}}&types={{request('types')}}&sorts={{request('sorts')}}&years={{ $year }}">{{ $year }}</a>
        </li>
    @endforeach
</ul>
<ul class="stui-screen__list type-slide bottom-line-dot clearfix">
    <li><span class="text-muted">Xắp sếp</span></li>
    <li class="@if (request('sorts') == 'update') active @endif"><a
            href="/?search={{request('search')}}&regions={{request('regions')}}&categorys={{request('categorys')}}&years={{request('years')}}&types={{request('types')}}&sorts=update">Thời
            gian cập nhật</a></li>
    <li class="@if (request('sorts') == 'create') active @endif"><a
            href="/?search={{request('search')}}&regions={{request('regions')}}&categorys={{request('categorys')}}&years={{request('years')}}&types={{request('types')}}&sorts=create">Thời
            gian đăng</a></li>
    <li class="@if (request('sorts') == 'year') active @endif"><a
            href="/?search={{request('search')}}&regions={{request('regions')}}&categorys={{request('categorys')}}&years={{request('years')}}&types={{request('types')}}&sorts=year">Năm
            sản xuất</a></li>
    <li class="@if (request('sorts') == 'view') active @endif"><a
            href="/?search={{request('search')}}&regions={{request('regions')}}&categorys={{request('categorys')}}&years={{request('years')}}&types={{request('types')}}&sorts=view">Lượt
            xem</a></li>
    <li class="@if (request('sorts') == 'rating') active @endif"><a
            href="/?search={{request('search')}}&regions={{request('regions')}}&categorys={{request('categorys')}}&years={{request('years')}}&types={{request('types')}}&sorts=rating">Lượt
            đánh giá</a></li>
</ul>
