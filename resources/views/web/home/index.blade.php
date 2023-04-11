@extends(TEMPLATE)
@section('content')
    <div class="p-top ">
        <div class="c-top-header">
            <div class="c-top-header__desc d-flex container">
                <div class="col-8 mt-3 pt-5">
                    <h2 class="c-top-header__title pt-5 text-white fs-32">Top 10 Nhà cái uy tín nhất Việt Nam &amp; Thế Giới 01/2023</h2>
                    <p class="text-white fs-16">
                        Dưới đây là TOP 10 nhà cái nên uy tín nên chơi năm 2023, tiêu chí lựa chọn, khuyến mãi, bài đánh giá
                        chi
                        tiết phía dưới. Mời bạn tham khảo.
                    </p>
                </div>
                <img class="col-4 mt-3"
                    src="https://bossnhacai.com/wp-content/themes/nhacai68/assets/images/top1cacuoc-head.png" width=""
                    alt="img" class="lazyloaded" data-ll-status="loaded"><noscript>
                    <img src="https://bossnhacai.com/wp-content/themes/nhacai68/assets/images/top1cacuoc-head.png"
                        alt="img"></noscript>
            </div>
            <div class="img">
                <img src="https://bossnhacai.com/wp-content/themes/nhacai68/assets/images/bg-top.svg" alt="img" class="lazyloaded" data-ll-status="loaded"><noscript><img src="https://bossnhacai.com/wp-content/themes/nhacai68/assets/images/bg-top.svg" alt="img"></noscript>
            </div>
            </div>
    </div>
    <main class="container home_custom mt-5">
        <div class="d-flex flex-wrap">
            <div class="mb-2 game-bai pt-4 col-12 col-lg-9">

                @if (!empty($top_game_info))
                    <h2 class="row font-22 font-weight-600 mb-4 mt-4 text-black3 position-relative pl-3">
                        {{ $top_game_info->where('setting_key', 'site_title_top_list')->first()->setting_value }}
                    </h2>
                    {!! $top_game_info->where('setting_key', 'site_content')->first()->setting_value !!}
                @endif
                @if (!empty($game_bai))
                    {!! viewGameBai($game_bai) !!}
                @endif

                {!! !empty($home_content) ? tableOfContent($home_content->setting_value) : '' !!}

                @php
                    
                    $color_array = ['red', 'green', 'blue1', 'red', 'blue'];
                @endphp
                @foreach ($category_homepage as $key => $item)
                    @if ($key < 3)
                        {!! initBoxNewsHomepage($item, '_list_post', $color_array[$key] . ' home_post') !!}
                    @else
                        {!! initBoxNewsHomepage($item, '_list_post_highlight', $color_array[$key] . 'home_post') !!}
                    @endif
                @endforeach

            </div>

            @include('web.block._nhacai_uytin')
        </div>
    </main>
@endsection
