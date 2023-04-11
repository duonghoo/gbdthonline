@extends('admin.layout')
@section('content')
    <main class="c-main">
        <div class="container-fluid">
            <div class="fade-in">
                <form method="post" action="">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="card">
                                <div class="card-header"><strong>{{!empty($oneItem) ? 'Chỉnh sửa' : 'Thêm mới'}} Nhà cái</strong> ( {{$arr_type[$type]}} )</div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Tên nhà cái</label>
                                                <input class="form-control" required name="name" value="{{!empty($oneItem->name) ? $oneItem->name : ''}}" type="text" placeholder="Tên nhà cái">
                                            </div>
                                            @if($type == 1)
                                                <div class="form-group">
                                                    <label>Lượt bình chọn</label>
                                                    <input class="form-control" name="content[count]" value="{{!empty($count) ? $count : ''}}" type="text" placeholder="Lượt bình chọn">
                                                </div>
                                                <div class="form-group">
                                                    <label>Khuyến mãi</label>
                                                    <textarea class="form-control" name="content[khuyen_mai]" rows="4" placeholder="Khuyến mãi">{{!empty($khuyen_mai) ? $khuyen_mai : ''}}</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>Link cược ngay</label>
                                                    <input class="form-control" name="content[link]" value="{{!empty($link) ? $link : ''}}" type="text" placeholder="Link cược ngay">
                                                </div>
                                            @elseif ($type == 2)
                                                <div class="form-group">
                                                    <label>Mô tả</label>
                                                    <input class="form-control" name="content[description]" value="{{!empty($description) ? $description : ''}}" type="text" placeholder="Mô tả">
                                                </div>
                                                <div class="form-group">
                                                    <label>Link xem review</label>
                                                    <input class="form-control" name="content[link]" value="{{!empty($link) ? $link : ''}}" type="text" placeholder="Link xem review">
                                                </div>
                                            @elseif ($type == 3)
                                                <div class="form-group">
                                                    <label>Số người chơi</label>
                                                    <input class="form-control" name="content[count]" value="{{!empty($count) ? $count : ''}}" type="text" placeholder="Số người chơi">
                                                </div>
                                                <div class="form-group">
                                                    <label>Link xem review</label>
                                                    <input class="form-control" name="content[link]" value="{{!empty($link) ? $link : ''}}" type="text" placeholder="Link xem review">
                                                </div>
                                            @elseif ($type == 4)
                                                <div class="form-group">
                                                    <label>Tên ngắn</label>
                                                    <input class="form-control" name="content[short_name]" value="{{!empty($short_name) ? $short_name : ''}}" type="text" placeholder="Tên ngắn">
                                                </div>
                                                <div class="form-group">
                                                    <label>Link đăng nhập</label>
                                                    <input class="form-control" name="content[link]" value="{{!empty($link) ? $link : ''}}" type="text" placeholder="Link đăng nhập">
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-lg-6">
                                                        <label>Độ tin cậy</label>
                                                        <input class="form-control" name="content[number_1]" value="{{!empty($number_1) ? $number_1 : ''}}" type="text" placeholder="Độ tin cậy">
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label>Tỷ lệ cược</label>
                                                        <input class="form-control" name="content[number_2]" value="{{!empty($number_2) ? $number_2 : ''}}" type="text" placeholder="Tỷ lệ cược">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-lg-6">
                                                        <label>Tiền thưởng</label>
                                                        <input class="form-control" name="content[number_3]" value="{{!empty($number_3) ? $number_3 : ''}}" type="text" placeholder="Tiền thưởng">
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label>Tốc độ thanh toán</label>
                                                        <input class="form-control" name="content[number_4]" value="{{!empty($number_4) ? $number_4 : ''}}" type="text" placeholder="Tốc độ thanh toán">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-lg-6">
                                                        <label>Chăm sóc khách hàng</label>
                                                        <input class="form-control" name="content[number_5]" value="{{!empty($number_5) ? $number_5 : ''}}" type="text" placeholder="Chăm sóc khách hàng">
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label>Tổng điểm</label>
                                                        <input class="form-control" name="content[number_6]" value="{{!empty($number_6) ? $number_6 : ''}}" type="text" placeholder="Tổng điểm">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Nội dung</label>
                                                    <textarea id="full-featured" class="form-control" name="content[description]" placeholder="Mô tả">{{!empty($description) ? $description : ''}}</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-check checkbox">
                                                        <input class="form-check-input" name="content[only_content]" id="check1" type="checkbox" {{!empty($only_content) ? 'checked' : ''}} value="1">
                                                        <label class="form-check-label" for="check1">Chỉ hiện nội dung</label>
                                                    </div>
                                                </div>
                                            @elseif ($type == 5 || $type == 6)
                                                <div class="form-group">
                                                    <label>Mô tả</label>
                                                    <input class="form-control" name="content[description]" value="{{!empty($description) ? $description : ''}}" type="text" placeholder="Mô tả">
                                                </div>
                                                <div class="form-group">
                                                    <label>Lượt bình chọn</label>
                                                    <input class="form-control" name="content[count]" value="{{!empty($count) ? $count : ''}}" type="text" placeholder="Lượt bình chọn">
                                                </div>
                                                <div class="form-group">
                                                    <label>Link nhận gift code</label>
                                                    <input class="form-control" name="content[link_gift_code]" value="{{!empty($link_gift_code) ? $link_gift_code : ''}}" type="text" placeholder="Link nhận gift code">
                                                </div>
                                                <div class="form-group">
                                                    <label>Link chơi ngay</label>
                                                    <input class="form-control" name="content[link_play]" value="{{!empty($link_play) ? $link_play : ''}}" type="text" placeholder="Link chơi ngay">
                                                </div>
                                                <div class="form-group">
                                                    <label>Link Xem Review</label>
                                                    <input class="form-control" name="content[link_review]" value="{{!empty($link_review) ? $link_review : ''}}" type="text" placeholder="Link Xem Review">
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-header"><strong>Thông tin khác</strong></div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Logo nhà cái</label>
                                        @if(!empty($logo))
                                            <img src="{{$logo}}" id="lbl_img" class="img-fluid d-block" onclick="upload_file('chosefile','img')">
                                        @else
                                            <img src="{{url('admin/images/no-image.jpg')}}" id="lbl_img" class="img-fluid d-block" onclick="upload_file('chosefile','img')">
                                        @endif
                                        <input type="hidden" id="hd_img" name="content[logo]" value="{{!empty($logo) ? $logo: ''}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Thứ tự</label>
                                        <input class="form-control" name="order_by" value="{{!empty($oneItem->order_by) ? $oneItem->order_by : 0}}" type="number" placeholder="Thứ tự" min="0">
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
