@extends(TEMPLATE)
@section('content')
    <main class="container home_custom">
        <div class="d-flex flex-wrap">
            <div class="col-12 mb-2 game-bai pt-4">
             
                @if(!empty($top_game_info))
                <h2 class="row font-22 font-weight-600 mb-4 text-black3 position-relative pl-3">
                    {{ $top_game_info->where('setting_key','site_title_top_list')->first()->setting_value}}
                </h2>
                {!! $top_game_info->where('setting_key','site_content')->first()->setting_value!!}
            @endif
                @if(!empty($game_bai))
                    {!! viewGameBai($game_bai) !!}
                @endif

                {!! !empty($home_content) ? tableOfContent($home_content->setting_value) : '' !!}
    
                @php
                
                    $color_array = ['red', 'green', 'blue1', 'red', 'blue'];
                @endphp
                @foreach ($category_homepage as $key => $item)
                  
                    @if($key < 3)
                        {!! initBoxNewsHomepage($item, '_list_post', $color_array[$key].' home_post') !!}
                    @else
                        {!! initBoxNewsHomepage($item, '_list_post_highlight', $color_array[$key]. 'home_post') !!}
                    @endif
                @endforeach
            </div>
        </div>
    </main>
@endsection
