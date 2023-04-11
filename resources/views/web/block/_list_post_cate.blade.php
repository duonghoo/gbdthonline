@php 
 
  
@endphp

<section class="box-news-red mb-3">
    <h2 class="mb-4 w-100">
        <a href="#" class="text-white px-3 py-2 font-14 text-decoration-none d-inline-block">Bài viết liên quan</a>
    </h2>
    <div class="row d-flex flex-wrap" id="ajax_content">
        @foreach($post_cate as $value)
        <article class="col-12 d-flex flex-wrap mb-3 width-20">
            <div class="col-lg-12 px-0 position-relative">
                <a href="{{getUrlPost($value)}}" title="{{$value->title}}">{!! get_thumbnail($value->thumbnail, '', '', 'img-fluid', $value->title) !!}</a>
                {{-- <a class="category-badge font-10 font-weight-600 text-white text-uppercase bg-black1 px-2 py-1 position-absolute left-0 bottom-0 text-decoration-none" href="{{ getUrlCate($value->category[0]) }}" title="{{$value->category[0]->title}}">{{$value->category[0]->title}}</a> --}}
            </div>
            <h3 class="col-lg-12 font-16 px-0 mt-2">
                <a href="{{getUrlPost($value)}}" title="{{$value->title}}" class="text-black3 text-decoration-none max-line-2 pl-0 pr-0 mt-2 fw-bold">{{$value->title}}</a>
            </h3>
            {{-- <p class="text-grey4 font-13 max-line-3">{!!  $value->content->description ?? get_limit_content($value->content, 200) !!}</p> --}}
        </article>
        @endforeach
    </div>
    <div class="row">
        <div class="w-100 d-flex justify-content-center">
            <a href="{{IS_AMP ? '#' : 'javascript:;'}}" class="border px-5 py-2 font-11 text-decoration-none view-more load-more" data-page="4">XEM THÊM</a>
        </div>
    </div>
</section>
