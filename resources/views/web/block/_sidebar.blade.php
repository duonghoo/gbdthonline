<aside class="col-12 col-lg-4 px-0 pl-lg-4">
    {!! initGameBaiSidebar() !!}
    <section class="row">
        <div class="col-12 mb-4">
            <div class="sidebar-title mb-3">
                <h3 class="font-14 mb-0">
                    <span class="position-relative text-white bg-black1 d-inline-block pt-2 pb-1 pl-2 pr-4">Bài viết
                        mới</span>
                </h3>
            </div>
            @foreach ($new_post as $value)
                <article class="col-12 d-flex px-0 mb-3">
                    <div class="col-4 px-0">
                        <a href="{{ getUrlPost($value) }}">

                            {!! get_thumbnail($value->thumbnail, '', '', 'img-fluid', $value->title) !!}
                        </a>
                    </div>
                    <div class="col-8">
                        <h3 class="font-14 mb-0">
                            <a class="font-weight-500 text-justify line-height-15 text-decoration-none text-black1"
                                href="{{ getUrlPost($value) }}">{!! $value->title !!}</a>
                        </h3>
                    </div>
                </article>
            @endforeach
        </div>
    </section>
    <section class="row">
        @if (!empty($sidebar))
            @foreach ($sidebar as $item)
                <div class="col-12 mb-3">
                    <div class="sidebar-title mb-0 border-title-black1">
                        <h3 class="font-14 mb-0">
                            <span class="position-relative text-white bg-black1 d-inline-block pt-2 pb-1 pl-2 pr-4">
                                @if ($item->name == 'Game Bài')
                                    @php
                                        $item->name = 'Game bài đổi thưởng';
                                    @endphp
                                @endif
                                {{ $item->name }}
                            </span>
                        </h3>
                    </div>
                </div>
                <div class="mt-0 d-flex w-100 align-content-start flex-wrap col-12">
                    @if (!empty($item->item))
                        @foreach ($item->item as $value)
                            <div class="w-50 custom-pl mb-3 mt-0">
                                <div class="img-gbdt">
                                    <a href="{{ getUrlPost($value) }}" title="{{ $value->title }}" rel="nofollow">
                                    </a>
                                    {!! get_thumbnail($value->thumbnail, 350, 250, 'img-fluid', $value->title, 'responsive', true) !!}
                                </div>
                                <h3 class=" font-14 font-lg-15 font-weight-500 pl-3 pl-lg-0 pr-0 mt-0 mt-lg-2">
                                    <a href="{{ getUrlPost($value) }}" title=" {!! $value->title !!}"
                                        class="text-black3 text-decoration-none box-news-title max-line-2">
                                        {!! $value->title !!}
                                    </a>
                                </h3>
                            </div>
                        @endforeach
                    @endif
                </div>
            @endforeach
        @endif
    </section>
</aside>
