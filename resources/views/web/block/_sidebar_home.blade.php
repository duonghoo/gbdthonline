<aside class="col-12 col-lg-4 px-0 pl-lg-4">
    <section class="row">
        <div class="col-12 mb-2">
            <div class="bg-red2 rounded px-3 py-2">
                <h3 class="font-16 mb-0 text-white text-decoration-none font-weight-500 text-uppercase">BÀI VIẾT NỔI BẬT</h3>
            </div>
        </div>
        @php $value = $sidebar_post_homepage[0] @endphp
        <article class="col-12">
            <a href="{{ getUrlPost($value) }}">
                {!! get_thumbnail($value->thumbnail, 480, 240, 'img-fluid', $value->title, 'responsive', true) !!}
            </a>
            <h3 class="font-15 my-2">
                <a class="font-weight-500 text-justify line-height-15 text-decoration-none text-black1" href="{{ getUrlPost($value) }}">{!! $value->title !!}</a>
            </h3>
            <p class="text-black3 font-14">{{ $value->description }}</p>
        </article>
        @php unset($sidebar_post_homepage[0]) @endphp
        @foreach($sidebar_post_homepage as $value)
            <article class="col-12 mb-3 d-flex">
                <div class="col-4 px-0">
                    <a href="{{ getUrlPost($value) }}">
                        {!! get_thumbnail($value->thumbnail, 350, 250, 'img-fluid', $value->title, 'responsive', true) !!}
                    </a>
                </div>
                <div class="col-8">
                    <h3 class="font-15 mb-0">
                        <a class="font-weight-500 text-justify line-height-15 text-decoration-none text-black1" href="{{ getUrlPost($value) }}">{!! $value->title !!}</a>
                    </h3>
                </div>
            </article>
        @endforeach
    </section>
</aside>
