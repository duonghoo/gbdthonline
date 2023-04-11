@php $is_home = getCurrentController() == 'home' @endphp
<div class="col-12 mb-2 game-bai pt-4">
    @php $i = 0 @endphp
    @foreach ($data as $value)
        @if (empty($value->content))
            @continue
        @endif
        @php $content = json_decode($value->content); @endphp
        <div class="row border rounded shadow bg-white py-3 text-center mb-4 position-relative ">
            <span class="medal position-absolute text-white text-center font-14 rounded"><?= $i + 1 ?></span>
            <div class="col-4 col-lg-2 d-flex justify-content-center mb-3 px-1">
                <a href="{{ $content->link }}" class="game-bai-thumb">
                    @if (IS_MOBILE)
                        {!! get_thumbnail($content->logo, 80, 80, 'img-fluid', $value->name, 'fixed', true) !!}
                    @else
                        {!! get_thumbnail($content->logo, 200, 200, 'img-fluid', $value->name, 'fixed', true) !!}
                    @endif
                </a>
            </div>
            <div class="col-8 col-lg-4 my-3 border-lg-left  d-none d-lg-block">
                @php
                if (!isset($content->rate)) {
                    $content->rate = 5;
                }
                if (!isset($content->count)) {
                    $content->count = 1;
                }
             @endphp
                <div class="d-none d-lg-block">
                    <h3 class="font-weight-600 text-black3 font-20 text-left text-lg-center">{{ $value->name }}</h3>
                    <p class="mb-0 font-14 text-black3 ">{!! $content->description !!}</p>
                 </div>
                    
                    <div class="font-14 text-black3  d-flex flex-column text-left px-0 d-block d-lg-none ">
                        <h3 class="font-weight-600 text-black3 font-18 text-left mb-0 px-0">{{ $value->name }}</h3>
                        <div class="font-14 text-black3 d-flex justify-content-start">{!! initRatingParam($content->rate, $content->count, $value->name, md5($value->name)) !!}</div>
                        <p class="mb-0 px-0 font-14 text-black3 font-weight-600">{!! $content->description !!}</p>
                    </div>
            </div>
            <div class="col-8 col-lg-4 border-lg-left d-block d-lg-none px-1">
                @php
                if (!isset($content->rate)) {
                    $content->rate = 5;
                }
                if (!isset($content->count)) {
                    $content->count = 1;
                }
             @endphp
             <div class="d-none d-lg-block">
                <h3 class="font-weight-600 text-black3 font-20 text-left text-lg-center">{{ $value->name }}</h3>
                <p class="mb-0 font-14 text-black3 ">{!! $content->description !!}</p>
                
             </div>
                
                <div class="font-12 text-black3 d-flex flex-column text-left d-block d-lg-none px-0">
                    <h3 class="font-weight-600 text-black3 font-20 text-left text-lg-center mb-0">{{ $value->name }}</h3>
                    <div class="font-12 text-black3 d-flex justify-content-start">{!! initRatingParam($content->rate, $content->count, $value->name, md5($value->name)) !!}</div>
                    <p class="mb-0 font-12 text-black3 font-weight-600 text-only-1-line">{!! $content->description !!}</p>
                </div>
            </div>
            <div class="col-4 col-lg-4 border-left border-right my-3 d-none d-lg-block">
                <div class="font-14 text-black3 d-flex justify-content-center">{!! initRatingParam($content->rate, $content->count, $value->name, md5($value->name)) !!}</div>
                <a href="/gift-code/" rel="nofollow" class="text-decoration-none">
                    <span class="font-weight-600 font-14 text-red1">Nhận gift Code</span>
                    {!! get_thumbnail('/web/images/hot.gif', 22, 11, 'img-fluid', 'hot', 'fixed', true, false) !!}
                </a>
            </div>
            <div class="{{ $is_home ? 'font-16' : 'font-14 px-2 px-lg-1' }} col-12 col-lg-2 d-flex flex-row flex-lg-column justify-content-center py-0 py-lg-2">
                <a href="{{ $content->link_cuocngay }}" target="_blank" rel="nofollow"
                    class="bg-green1 rounded-pill text-decoration-none py-2 mb-lg-2 flex-grow-1 flex-lg-grow-0 mr-2 mr-lg-0 text-white font-14">
                    <span class="icon-checkmark-outline"></span> Cược ngay</a>
                <a href="{{ $content->link }}" rel="nofollow"
                    class="bg-grey1 rounded-pill text-decoration-none py-2 flex-grow-1 flex-lg-grow-0 text-white font-14">
                    <span class="icon-arrow-outline-right"></span> Xem review</a>
            </div>
        </div>
        
        @php $i++ @endphp
    @endforeach
</div>
