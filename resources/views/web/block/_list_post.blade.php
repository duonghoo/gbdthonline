@php
    $category = $post;
    $post = $post->item;
@endphp

<section class="box-news-{{ $color }} mb-3">
    <h2 class="mb-4 w-100">
        <a href="{{ getUrlLink($category->url) }}"
            class="text-white px-3 py-2 font-14 text-decoration-none d-inline-block">{{ $category->name }}</a>
    </h2>

    <div class="row" id="ajax_content">
        @foreach ($post as $key => $value)
            <article class="col{{ IS_MOBILE ? '-12' : '' }} d-flex flex-wrap mb-3 width-20">
                <div class="col-12 col-lg-12 px-0 position-relative">
                    <a href="{{ getUrlPost($value) }}" title="{{ $value->title }}">{!! get_thumbnail($value->thumbnail, '', '', 'img-fluid', $value->title) !!}</a>
                    {{-- <a class="category-badge font-10 font-weight-600 text-white text-uppercase bg-black1 px-2 py-1 position-absolute left-0 bottom-0 text-decoration-none" href="{{ getUrlCate($value->category[0]) }}" title="{{$value->category[0]->title}}">{{$value->category[0]->title}}</a> --}}
                </div>
                <h3 class="col-12 col-lg-12 font-14 font-lg-15 font-weight-500 pl-0 pr-0 mt-2 fw-bold mt-lg-2">
                    <a href="{{ getUrlPost($value) }}" title="{{ $value->title }}" class="text-black3 text-decoration-none box-news-title max-line-2">{{ $value->title }}</a>
                </h3>
            </article>
        @endforeach
    </div>

    <div class="row">
        <div class="w-100 d-flex justify-content-center">
            <a href="{{ IS_AMP ? '#' : 'javascript:;' }}"
                class="border px-5 py-2 font-11 text-decoration-none view-more load-more" data-page="4">XEM THÊM</a>
        </div>
    </div>
</section>
