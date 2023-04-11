@extends('admin.layout')
@section('content')
    <main class="c-main">
        <div class="container-fluid">
            <div class="fade-in">
                <form class="form-post" method="post" action="">
                    <input type="hidden" name="user_id" value="{{!empty($oneItem)? $oneItem->user_id: $user_id}}">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="card">
                                <div class="card-header"><strong>{{!empty($oneItem) ? 'Chỉnh sửa' : 'Thêm mới'}} Trang tĩnh</strong>{!!!empty($oneItem) ? ' - <a rel="nofollow" target="_blank" href="'.getUrlStaticPage($oneItem).'">'.$oneItem->title.'</a>' : ''!!}</div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Tiêu đề</label>
                                                <input class="form-control" required name="title" value="{{!empty($oneItem->title) ? $oneItem->title : ''}}" type="text" placeholder="Tiêu đề">
                                            </div>
                                            <div class="form-group">
                                                <label>Mô tả</label>
                                                <textarea id="tiny-featured" class="form-control" rows="4" name="description">{{!empty($oneItem->description) ? $oneItem->description : ''}}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Nội dung</label>
                                                <textarea id="full-featured" class="form-control" name="content">{{!empty($oneItem->content) ? $oneItem->content : ''}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
{{--                            <div class="card">--}}
{{--                                <div class="card-header"><strong>Thông tin khác</strong></div>--}}
{{--                                <div class="card-body">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label>Thumbnail</label>--}}
{{--                                        @if(!empty($oneItem->thumbnail))--}}
{{--                                            <img src="{{$oneItem->thumbnail}}" id="lbl_img" class="img-fluid d-block" onclick="upload_file('chosefile','img')">--}}
{{--                                        @else--}}
{{--                                            <img src="{{url('admin/images/no-image.jpg')}}" id="lbl_img" class="img-fluid d-block" onclick="upload_file('chosefile','img')">--}}
{{--                                        @endif--}}
{{--                                        <input type="hidden" name="thumbnail" id="hd_img" value="{{!empty($oneItem->thumbnail)? $oneItem->thumbnail: ''}}" required>--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label>Tiêu đề SEO</label>--}}
{{--                                        <input class="form-control" name="meta_title" value="{{!empty($oneItem->meta_title) ? $oneItem->meta_title : ''}}" type="text" placeholder="Tiêu đề SEO">--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label>Mô tả SEO</label>--}}
{{--                                        <textarea class="form-control" name="meta_description" rows="4" placeholder="Mô tả SEO">{{!empty($oneItem->meta_description) ? $oneItem->meta_description : ''}}</textarea>--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label>Từ khóa SEO</label>--}}
{{--                                        <input class="form-control" name="meta_keyword" value="{{!empty($oneItem->meta_keyword) ? $oneItem->meta_keyword : ''}}" type="text" placeholder="Từ khóa SEO">--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label>Trạng thái</label>--}}
{{--                                        <select name="status" class="form-control">--}}
{{--                                            <option {{isset($oneItem->status) && $oneItem->status == 1 ? 'selected' : ''}} value="1">Công khai</option>--}}
{{--                                            <option {{isset($oneItem->status) && $oneItem->status == 0 ? 'selected' : ''}} value="0">Bản nháp</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label>Thời gian hiển thị</label>--}}
{{--                                        <input class="form-control" name="displayed_time" value="{{!empty($oneItem->displayed_time) ? date('Y-m-d\TH:i:s', strtotime($oneItem->displayed_time)) : date('Y-m-d\TH:i:s')}}" type="datetime-local">--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group float-right">--}}
{{--                                        <button type="submit" class="btn btn-primary">Lưu trữ</button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="card mb-4">
                                <div class="card-header" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><span id="seo-score" class="btn btn-outline-danger"></span><strong class="ml-3">Đánh giá SEO</strong></div>
                                <div class="collapse" id="collapseExample">
                                    <ul class="data-seo-score list-unstyled p-3">
                                        <li class="keyword-length" data-score="0"></li>
                                        <li class="keyword-in-slug" data-score="0"></li>
                                        <li class="keyword-in-title" data-score="0"></li>
                                        <li class="keyword-in-desc" data-score="0"></li>
                                        <li class="title-length" data-score="0"></li>
                                        <li class="desc-length" data-score="0"></li>
                                        <li class="position-keyword-in-title" data-score="0"></li>
                                        <li class="position-keyword-in-desc" data-score="0"></li>
                                        <li class="count-keyword-in-content" data-score="0"></li>
                                        <li class="link-in-content" data-score="0"></li>
                                        <li class="count-heading" data-score="0"></li>
                                        <li class="keyword-in-heading" data-score="0"></li>
                                        <li class="alt-img" data-score="0"></li>
                                    </ul>
                                </div>
                                <input name="word_count" type="hidden" value="{{$oneItem->word_count ?? 0}}">
                                <input name="seo_score" type="hidden" value="{{$oneItem->seo_score ?? 0}}">
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>
                                            Tiêu đề SEO
                                            <span class="text-danger" id="title-count-text">
                                                    <span>Độ dài hiện tại: </span>
                                                    <span id="title-count">0</span> ký tự</span>
                                        </label>
                                        <input class="form-control" name="meta_title" value="{{!empty($oneItem->meta_title) ? $oneItem->meta_title : ''}}" type="text" placeholder="Tiêu đề SEO">
                                    </div>
                                    <div class="form-group">
                                        <label>Đường dẫn (URL)</label>
                                        <input class="form-control" name="slug" value="{{!empty($oneItem->slug) ? $oneItem->slug : ''}}" type="text" placeholder="Slug trang tĩnh">
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            Mô tả SEO
                                            <span class="text-danger" id="description-count-text">
                                                <span>Độ dài hiện tại: </span>
                                                <span id="description-count">0</span> ký tự
                                            </span>
                                        </label>
                                        <textarea class="form-control" name="meta_description" rows="4" placeholder="Mô tả SEO">{{!empty($oneItem->meta_description) ? $oneItem->meta_description : ''}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            Từ khóa SEO
                                        </label>
                                        <input class="form-control" name="main_keyword" value="{{!empty($oneItem->main_keyword) ? $oneItem->main_keyword : ''}}" type="text" placeholder="Từ khóa SEO">
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            Từ khóa liên quan
                                        </label>
                                        <input class="form-control" name="meta_keyword" value="{{!empty($oneItem->meta_keyword) ? $oneItem->meta_keyword : ''}}" type="text" placeholder="Từ khóa liên quan">
                                    </div>
                                    <div class="form-group">
                                        <label>Trạng thái</label>
                                        <select name="status" class="form-control">
                                            <option {{isset($oneItem->status) && $oneItem->status == 1 ? 'selected' : ''}} value="1">Công khai</option>
                                            <option {{isset($oneItem->status) && $oneItem->status == 0 ? 'selected' : ''}} value="0">Bản nháp</option>
                                        </select>
                                    </div>
                                    <div class="form-group float-right">
                                        <button type="submit" class="btn btn-primary">Lưu trữ</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
