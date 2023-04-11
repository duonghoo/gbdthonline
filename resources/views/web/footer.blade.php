<footer class="container-fluid px-0">
    <div class="bg-black4 py-5">
        <div class="container social-footer d-flex justify-content-center mb-3">
            <a href="{{getSiteSetting('site_pinterest')}}" rel="nofollow" class="mx-2 text-white bg-black6 rounded-circle p-3 d-flex align-items-center justify-content-center">
                <span class="icon-pinterest-p"></span>
            </a>
            <a href="{{getSiteSetting('site_twitter')}}" rel="nofollow" class="mx-2 text-white bg-black6 rounded-circle p-3 d-flex align-items-center justify-content-center">
                <span class="icon-twitter"></span>
            </a>
            <a href="{{getSiteSetting('site_reddit')}}" rel="nofollow" class="mx-2 text-white bg-black6 rounded-circle p-3 d-flex align-items-center justify-content-center">
                <span class="icon-reddit"></span>
            </a>
            <a href="{{getSiteSetting('site_tumblr')}}" rel="nofollow" class="mx-2 text-white bg-black6 rounded-circle p-3 d-flex align-items-center justify-content-center">
                <span class="icon-tumblr"></span>
            </a>
            <a href="{{getSiteSetting('site_instagram')}}" rel="nofollow" class="mx-2 text-white bg-black6 rounded-circle p-3 d-flex align-items-center justify-content-center">
                <span class="icon-instagram"></span>
            </a>
        </div>
        <div class="container text-grey2 text-center">
            <a href="/" class="font-14 font-weight-600 text-uppercase text-grey2 text-decoration-none mr-3">TRANG CHỦ</a>
            @if(!empty($MenuFooter))
                @foreach($MenuFooter as $value)
                    <a {{ !empty($value['rel']) ? 'rel='.$value["rel"].'' : '' }} {{ !empty($value['target']) ? 'target='.$value["target"].'' : '' }} href="{{ getUrlLink($value['url']) }}" class="font-14 font-weight-600 text-uppercase text-grey2 text-decoration-none mr-3">{{ $value['name'] }}</a>
                @endforeach
            @endif
        </div>
    </div>
    <div class="bg-black5 py-3">
        <div class="container font-13 text-grey3 text-center">
            <span class="d-inline-block">{!! getSiteSetting('site_copyright') !!}</span>
            <a href="//www.dmca.com/Protection/Status.aspx?ID=976fc249-6764-4417-9361-cdcac91ca6c3" title="DMCA.com Protection Status" class="dmca-badge">
                {!! get_thumbnail('/web/images/dmca-badge-w100-2x1-04.png', 100, 50, '', 'DMCA.com Protection Status', 'fixed', true, false) !!}
            </a>
{{--            <span>Liên hệ quảng cáo: <a rel="nofollow" href="mailto:{{getSiteSetting('site_email')}}">{{getSiteSetting('site_email')}}</a></span>--}}
            <span>  Liên hệ quảng cáo <a href="https://t.me/npadsvn" target="_blank" rel="nofollow"> https://t.me/npadsvn</a></span>
        </div>
    </div>
</footer>

<div class="fixed-bottom catfish d-none d-lg-flex flex-column align-items-center mx-auto">
    {!! getBannerPc('catfish-pc') !!}
</div>
<div class="fixed-bottom d-block d-lg-none">
    {!! getBannerMobile('catfish-mobile') !!}
</div>
<div class="float-left position-fixed left-0 " style="top:110px;z-index:9999;">
    {!! getBannerPc('float-left-pc') !!}
</div>
<div class="float-right position-fixed right-0 " style="top:110px;z-index:9999;">
    {!! getBannerPc('float-right-pc') !!}
</div>
<div class="float-right position-fixed bottom-0 right-0" style="z-index:9999;">
    {!! getBannerPc('balloon-right-pc') !!}
</div>