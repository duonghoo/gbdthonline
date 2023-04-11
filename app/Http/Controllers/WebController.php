<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\SiteRedirect;
use App\Models\SiteSetting;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
class WebController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $segment = Request::segments();
        $checkAmp = !empty($segment) ? end($segment) == 'amp' : false;

        define('IS_AMP', $checkAmp);
        if (IS_AMP)
            define('TEMPLATE', 'web.layout-amp');
        else
            define('TEMPLATE', 'web.layout');

        define('IS_MOBILE', isMobile());

        $this->getBannerData();
    }

    function getBannerData() {
        $keyCache = 'listBanner';
        if (!Cache::has($keyCache)) {
            $bannerApi = Http::get('https://omegaads.live/api/banner/gamebaidoithuongblog');
            $bannerData = $bannerApi->json();
            if ($bannerApi->status() == 200) {
                SiteSetting::updateOrInsert(['setting_key' => 'site_banner'], ['setting_value' => json_encode($bannerData)]);
            }
            Cache::put($keyCache, '1', 60);
        }
        if (empty($bannerData)) {
            $bannerData = SiteSetting::where('setting_key', 'site_banner')->first();
            $bannerData = json_decode($bannerData->setting_value,true);
        }
        // $bannerData = [];
        // $bannerData = Http::get('https://omegaads.live/api/banner/sitedemo')->json();
        if (!empty($bannerData)) {
            config(['app.banner' => $bannerData]);
        }
    }
}
