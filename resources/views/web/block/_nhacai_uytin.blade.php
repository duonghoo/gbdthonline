<div class="col-12 col-lg-3 mb-2 mt-5 game-bai border">
    <h2 class="row font-20 font-weight-600 mb-4 text-black3 position-relative mb-5 pl-3">TOP 10 NHÀ CÁI UY TÍN</h2>

    @foreach($game_bai as $value)
        @if(empty($value->post->optional)) @continue @endif
        @php $content = json_decode($value->post->optional); @endphp
        <div class="row d-flex c-top-game__item border rounded shadow bg-white py-3 px-2 mb-4 position-relative d-block">
            <a href="{{ getUrlPost($value->post) }}" class="col-4">
                {!! get_thumbnail($content->logo, '80', '80', 'img-fluid mb-2', $content->name, 'fixed') !!}
            </a>

            <div class="col-8">
            <h3 class="font-weight-bold text-black3 font-18 mb-2">{{ $content->name }}</h3>
         
            <div class="font-14 text-black3 d-flex justify-content-center">{!! initRating($value->post->slug) !!}</div>
        
            </div>
            @if(!IS_MOBILE && !IS_AMP)
            <div class="col-12 d-flex flex-row mt-2">
                <a href="{{ $content->link ??  getUrlPost($value->post) }}" target="_blank" rel="nofollow"
                   class="col mr-1 bg-red1 rounded-pill text-decoration-none px-4 py-1 text-white font-14">Review</a>
                <a href="{{ getUrlPost($value->post) }}" rel="nofollow"
                   class="col ml-1 bg-green1 rounded-pill text-decoration-none px-4 py-1 text-white font-14">Đăng ký</a>
            </div>
            @else
            <div class="col-12 mt-2">
                <a href="{{ $content->link ??  getUrlPost($value->post) }}" target="_blank" rel="nofollow"
                   class="col mx-1 my-2 bg-red1 rounded-pill text-decoration-none px-4 py-2 text-white font-14 d-block">Review</a>
                <a href="{{ getUrlPost($value->post) }}" rel="nofollow"
                   class="col mx-1 my-2 bg-green1 rounded-pill text-decoration-none px-4 py-2 text-white font-14 d-block">Đăng ký</a>
            </div>

            @endif
        </div>
     
    @endforeach
</div>
