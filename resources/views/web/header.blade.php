@php $is_home = getCurrentController() == 'home' @endphp
@php if (!isset($is_category)) $is_category = 0 @endphp
<header class="container-fluid border-bottom c-header shadow-sm px-0 mb-2">
        @if(!IS_MOBILE)
            <nav class="container d-flex justify-content-between align-items-center">
                <ul class="nav w-100">
                    <?php $srcLogo = getSiteSetting('site_logo') ?>
                    <li>
                    <a href="{{ getUrlLink('/') }}" class="align-self-center">
                    {{-- @if(IS_MOBILE)
                        {!! get_thumbnail('/web/images/logo-bossnhacai.png', 150, 60, 'img-fluid', 'gamebaidoithuong', 'fixed', false, false) !!}
                    @else
                        {!! get_thumbnail('/web/images/logo-bossnhacai.png', 150, 60, 'img-fluid', 'gamebaidoithuong', 'fixed', false, false) !!}
                    @endif --}}
                    <img src="/web/images/logo-bossnhacai.png" width="150" height="60" class="img-fluid" alt="">
                    </a>
                    </li>
                    <li class="nav-item @if(empty($oneItem->slug)) active @endif ml-auto">
                        <a class="nav-link text-white font-14 font-weight-bold position-relative line-height-15" href="/">TRANG CHỦ</a>
                    </li>
                    @if(!empty($MainMenu))
                        @foreach($MainMenu as $value)
                            <li class="nav-item @if(!empty($value['children'])) dropdown @endif @if(!empty($breadCrumb[0]) && ($breadCrumb[0]['item'] == url($value['url']).'/')) active @endif">
                                <a {{ !empty($value['rel']) ? 'rel='.$value["rel"].'' : '' }} {{ !empty($value['target']) ? 'target='.$value["target"].'' : '' }} class="nav-link text-white font-14 font-weight-bold text-uppercase d-inline-block position-relative line-height-15" href="{{ getUrlLink($value['url']) }}" title="{{$value['name']}}">{{$value['name']}}</a>
                                @if(!empty($value['children'])) <span class="px-2 px-lg-0 icon-cheveron-down"></span> @endif
                                @if(!empty($value['children']))
                                    <div class="dropdown-content mx-2 bg-white">
                                        @foreach($value['children'] as $item)
                                            <a {{ !empty($item['rel']) ? 'rel='.$item["rel"].'' : '' }} {{ !empty($item['target']) ? 'target='.$item["target"].'' : '' }} class="d-block font-12 text-white text-decoration-none px-3 py-2 @if(!empty($breadCrumb[1]) && ($breadCrumb[1]['item'] == url($item['url']).'/')) active @endif"
                                               href="{{ getUrlLink($item['url']) }}" title="{{$item['name']}}">{{$item['name']}}</a>
                                        @endforeach
                                    </div>
                                @endif
                            </li>
                        @endforeach
                    @endif
                </ul>
                <div class="d-none d-lg-block">
                    <span class="icon-search btn text-white" data-toggle="modal" data-target="#modalCse"></span>
                </div>
            </nav>
        @endif
</header>

@if(IS_AMP)
    <amp-sidebar id="menuMobile" layout="nodisplay" side="left" class="bg-white">
        <!-- Modal Header -->
        <div class="modal-header border-bottom p-2 d-flex justify-content-between">
            <button type="button" class="close ml-auto" on="tap:menuMobile.close">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
            <ul class="nav flex-column">
                <li class="nav-item px-2 py-1 @if(empty($oneItem->slug)) active @endif">
                    <a class="nav-link text-white1 font-14 font-weight-bold position-relative" href="/">TRANG CHỦ</a>
                </li>
                @if(!empty($MainMenu))
                    @foreach($MainMenu as $value)
                        <li class="nav-item px-2 py-1 @if(!empty($value['children'])) dropdown @endif @if(!empty($oneItem->slug) && ("/$oneItem->slug/" == $value['url'])) active @endif">
                            <a {{ !empty($value['rel']) ? 'rel='.$value["rel"].'' : '' }} {{ !empty($value['target']) ? 'target='.$value["target"].'' : '' }} class="nav-link text-black1 font-14 font-weight-bold text-uppercase d-inline-block position-relative" href="{{ getUrlLink($value['url']) }}" title="{{$value['name']}}">{{$value['name']}}</a>
                            @if(!empty($value['children']))
                                <a href="{!! IS_AMP ? '#' : 'javascript:;' !!}" class="btn px-lg-0 showSubmenuMobile">
                                    <i class="icon-cheveron-down"></i>
                                </a>
                                <div class="dropdown-content mx-2 bg-white">
                                    @foreach($value['children'] as $item)
                                        <a {{ !empty($item['rel']) ? 'rel='.$item["rel"].'' : '' }} {{ !empty($item['target']) ? 'target='.$item["target"].'' : '' }} class="d-block font-13 text-grey1 text-decoration-none border-bottom px-3 py-2" href="{{ getUrlLink($item['url']) }}" title="{{$item['name']}}">{{$item['name']}}</a>
                                    @endforeach
                                </div>
                            @endif
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </amp-sidebar>
@elseif(IS_MOBILE)
    <div class="modal" id="menuMobile">
        <div class="modal-dialog my-0">
            <div class="modal-content animate-left-right border-0">

                <!-- Modal Header -->
                <div class="modal-header px-2 flex-wrap">
                    <form action="{{ env('APP_URL') }}" method="get" class="border rounded-pill pl-3 pr-2 d-flex justify-content-between col-10">
                        <input name="s" class="form-control border-0 w-75" placeholder="Search..." type="text" value="" autocomplete="off">
                        <button type="submit" class="btn">
                            <i class="icon-search"></i>
                        </button>
                    </form>
                    <button type="button" class="close col-2 p-0 m-0 font-38" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body px-0">
                    <ul class="nav flex-column">
                        <li class="nav-item px-2 py-1 @if(empty($oneItem->slug)) active @endif">
                            <a class="nav-link text-black1 font-14 font-weight-bold position-relative" href="/">TRANG CHỦ</a>
                        </li>
                        @if(!empty($MainMenu))
                            @foreach($MainMenu as $value)
                                <li class="nav-item px-2 py-1 @if(!empty($value['children'])) dropdown d-flex flex-wrap @endif @if(!empty($oneItem->slug) && ("/$oneItem->slug/" == $value['url'])) active @endif">
                                    <a {{ !empty($value['rel']) ? 'rel='.$value["rel"].'' : '' }} {{ !empty($value['target']) ? 'target='.$value["target"].'' : '' }} class="nav-link text-black1 font-14 font-weight-bold text-uppercase d-inline-block position-relative" href="{{ getUrlLink($value['url']) }}" title="{{$value['name']}}">{{$value['name']}}</a>
                                    @if(!empty($value['children']))
                                        <a href="javascript:;" class="btn px-lg-0 showSubmenuMobile">
                                            <i class="icon-cheveron-down"></i>
                                        </a>
                                        <div class="dropdown-content mx-2 bg-white">
                                            @foreach($value['children'] as $item)
                                                <a {{ !empty($item['rel']) ? 'rel='.$item["rel"].'' : '' }} {{ !empty($item['target']) ? 'target='.$item["target"].'' : '' }} class="d-block font-13 text-grey1 text-decoration-none border-bottom px-3 py-2" href="{{ getUrlLink($item['url']) }}" title="{{$item['name']}}">{{$item['name']}}</a>
                                            @endforeach
                                        </div>
                                    @endif
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endif

@if(!IS_AMP)
    <div class="modal" id="modalCse">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <p class="modal-title font-20 font-weight-500">Tìm kiếm</p>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="gcse-search"></div>
                </div>
            </div>
        </div>
    </div>
@endif
<div class="container">
    {!! getBannerPC('full-width-pc') !!}
</div>

