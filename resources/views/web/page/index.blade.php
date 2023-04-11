@extends(TEMPLATE)
@section('content')
    <main class="container mt-4">
        <div class="d-flex flex-wrap">
            <div class="col-12 col-lg-12 px-0 mb-5">
                    @if(!empty($breadCrumb))
                        {!! getBreadcrumb($breadCrumb) !!}
                    @endif
                <div class="">
                    <h1 class="font-weight-bold font-24"> {{$oneItem->title}} </h1>
                </div>
                        <div class="d-flex justify-content-between">
                            <p> {{ date_format(now(), "Y-m-d 06:00:00")}} </p>
                            <div class="font-14 text-black3 d-flex justify-content-center">{!! initRating($oneItem->slug,0,$oneItem->title,true) !!}</div>
                        </div>
                <div>
                        {!!$oneItem->description!!}
                </div>
                <section class="mb-5 w-100 text-black3">
                    @if(IS_AMP)
                        {!! add_amp_to_url(tableOfContent($oneItem->content)) !!}
                    @else
                        {!! tableOfContent($oneItem->content) !!}
                    @endif
                </section>
            </div>
        </div>
        {!! getSchemaArticle($oneItem) !!}
    </main>
@endsection
