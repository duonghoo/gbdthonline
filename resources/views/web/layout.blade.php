@php
$ver = '0.14';
$is_home = getCurrentController() == 'home';
@endphp
<!DOCTYPE html>
<html  lang="vi-VN">
<head>
    <meta charset="utf-8">
    {{--<meta name="google-site-verification" content="aEco6iEgzSJvRYBE6LCh75TMZHKoyJMIjat-lz7EzVg" />--}}
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @if(!empty($seo_data['index']))
    <meta name="robots" content="{{$seo_data['index']}}">
    @else
    <meta name="robots" content="index, follow">
    @endif
    <title>{{$seo_data['meta_title'] ?? ''}}</title>
    @if(!empty($seo_data['meta_keyword']))
        <meta name="keywords" content="{{$seo_data['meta_keyword']}}">
    @endif
    <meta name="description" content="{{$seo_data['meta_description'] ?? ''}}">
    <link rel="canonical" href="{{$seo_data['canonical'] ?? ''}}" />
    
    @if(!empty($seo_data['amphtml']))
        <link rel="amphtml" href="{{$seo_data['amphtml']}}">
    @endif

    {{-- <meta property="og:title" content="{{$seo_data['meta_title'] ?? ''}}">
    @if(!empty($seo_data['site_image']))
        <meta property="og:image" content="{{$seo_data['site_image']}}">
    @endif
    <meta property="og:site_name" content="Doithuongonline">
    <meta property="og:description" content="{{$seo_data['meta_description'] ?? ''}}">
    @if(!empty($seo_data['published_time']))
        <meta property="article:published_time" content="{{$seo_data['published_time']}}" />
    @endif
    @if(!empty($seo_data['modified_time']))
        <meta property="article:modified_time" content="{{$seo_data['modified_time']}}" />
    @endif
    @if(!empty($seo_data['updated_time']))
        <meta property="article:updated_time" content="{{$seo_data['updated_time']}}" />
    @endif --}}
    {!!getSiteSetting('meta_head')!!}
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-233653243-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-233653243-1');
    </script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-1WMEE35NYK"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-1WMEE35NYK');
    </script>
    <meta name="google-site-verification" content="XhRBhex5nX6A0S2vaJ-cOGjbIvQqXsRK6zDhUSt0g1A" />

    <meta name='dmca-site-verification' content='OVlBdFg2WVJwMlBHREdiUFNET0RtK0grYkdnNmJ2cHNVazBCR1NvZ2RqRT01' />

    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="{{$seo_data['meta_title'] ?? ''}}" />
    <meta name="twitter:description" content="{{$seo_data['meta_description'] ?? ''}}" />
    <meta name="twitter:site" content="@gbdtblog" />
    <meta name="twitter:url" content="{{$seo_data['canonical'] ?? ''}}" />
    @if(!empty($seo_data['site_image']))
        <meta name="twitter:image" content="{{url($seo_data['site_image'])}}" />
    @endif

    <!-- facebook meta tag -->
    <meta property="og:url" content="{{$seo_data['canonical'] ?? ''}}" />
    @if($is_home)
    <meta property="og:type" content="website" />
    @else
    <meta property="og:type" content="article" />
    @endif
    <meta property="og:title" content="{{$seo_data['meta_title'] ?? ''}}" />
    <meta property="og:description" content="{{$seo_data['meta_description'] ?? ''}}" />
    @if(!empty($seo_data['site_image']))
        <meta name="og:image" content="{{url($seo_data['site_image'])}}" />
    @endif
    @if(!empty($seo_data['published_time']))
        <meta property="article:published_time" content="{{$seo_data['published_time']}}" />
    @endif
    @if(!empty($seo_data['modified_time']))
        <meta property="article:modified_time" content="{{$seo_data['modified_time']}}" />
    @endif
    @if(!empty($seo_data['updated_time']))
        <meta property="article:updated_time" content="{{$seo_data['updated_time']}}" />
    @endif

    <link rel="shortcut icon" href="{{ url('web/images/favicon.png?3') }}" />
    <link rel="apple-touch-icon" href="{{ url('web/images/favicon.png?3') }}" />

    <!-- jQuery library -->
    {{--<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>--}}
    <script defer src="https://code.jquery.com/jquery-3.5.1.min.js"  ></script>
    <!-- Popper JS -->
    <script defer src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" ></script>
    <!-- Latest compiled JavaScript -->
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" ></script>

    <script defer src="https://images.dmca.com/Badges/DMCABadgeHelper.min.js" ></script>

    <style>
        <?php $css = file_get_contents('web/css/main.css');
        echo $css?>
    </style>
    @if(!empty($schema))
        {!!$schema!!}
    @endif
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-CB9V1ZEQ6F"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-CB9V1ZEQ6F');
</script>

</head>
<body>
@include('web.header')

@yield('content')

@include('web.footer')

<?php $popup = getBanner('popup-pc'); if ($popup):?>
<div id="adsModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content border-0 shadow-none" style="background: none;">
            <div class="modal-body mx-auto">
                @if(IS_MOBILE)
                <div class="text-center" style="max-width: 300px">
                    <?php echo $popup?>
                </div>
                @else
                <div class="text-center">
                    <?php echo $popup?>
                </div>
                @endif
                <span style="right: 14px;width: 30px;background: rgba(169,169,169,0.8);" class="d-none p-2 position-absolute text-center" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></span>
            </div>
        </div>
    </div>
</div>
<?php endif?>

<script defer src="/web/js/non-critical.min.js?{{ $ver }}"></script>

{{--search cse--}}
<script defer src="https://cse.google.com/cse.js?cx=e6d04e548ae7762a2"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        setTimeout(function () {
            loadFbComment();
        }, 3000);
    });
    function loadFbComment() {
        let js = document.createElement('script');
        js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v10.0';
        js.async = '';
        js.crossorigin = 'anonymous';
        js.nonce = 'qmS9eb4o';
        document.body.appendChild(js);
    }
</script>
<script>

    let is_mobile = (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent));
    let urlAdsMb = `{{ getBanner('popunder-mobile') }}`;
    let urlAdsPc = `{{ getBanner('popunder-pc') }}`;
    
    if ((urlAdsMb && is_mobile) || (urlAdsPc && !is_mobile)) {
        document.addEventListener('DOMContentLoaded', function () {
            
            let key = 'checkPopunder';
            let executed = false;

            if (!sessionStorage.getItem(key)) {
                
                sessionStorage.setItem(key, 1);
                $(document).on('click', 'a:not([target="_blank"][rel="nofollow"])', function (e) {
                    if (!executed) {
                        executed = true;
                        e.preventDefault();
                        openTab(this);
                    }
                });
            }
  
        });

        function openTab(_this) {
            _this = $(_this);
            let currentUrl = _this.attr('href');
            if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
                window.open(currentUrl, "_blank");
                window.location = urlAdsMb;
            } else {
                window.open(currentUrl, "_blank");
                window.location = urlAdsPc;
            }
        }
    }
    document.addEventListener('DOMContentLoaded', function () {
        $('.popup-banner').on('click', '.banner-close', function (e) {
            $(this).closest('.popup-banner').remove();
        });

        $('#adsModal').on('click', '.banner-close', function (e) {
            $('#adsModal').modal('hide');
        });
        
    });
</script>
</body>
</html>
