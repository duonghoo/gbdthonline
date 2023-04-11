@extends('admin.layout')
@section('content')
    <main class="c-main">
        <div class="container-fluid">
            <div class="fade-in">
                <div class="card">
                    <div class="card-header">
                        Danh sách chuyên mục
                        <div class="card-header-actions pr-1">
                            <a href="/admin/category/update"><button class="btn btn-block btn-primary btn-sm mr-3" type="button">Thêm mới</button></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered datatable">
                            <thead>
                            <tr>
                                <th class="text-center w-5">ID</th>
                                <th>Tên chuyên mục</th>
                                <th class="text-center">Link</th>
                                <th class="text-center w-15">Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                                @if(!empty($listItem)) @foreach($listItem as $item)
                                <tr>
                                    <td class="text-center">{{$item->id}}</td>
                                    <td><a target="_blank" href="{{getUrlCate($item, 0)}}">{{$item->sub_title}}</a> - <span class="text-success">{{$item->count_post}} bài viết</span></td>

                                    <td class="text-center">
                                        <p class="mb-0"><span class="font-weight-bold">{{$item->count_link_out}}</span></p>
                                    </td>
                                    
                                    <td class="text-center">
                                        <a class="btn btn-info" href="/admin/category/update/{{$item->id}}"><svg class="c-icon"><use xlink:href="/admin/images/icon-svg/free.svg#cil-pencil"></use></svg></a>
                                        <a class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa?')" href="/admin/category/delete/{{$item->id}}"><svg class="c-icon"><use xlink:href="/admin/images/icon-svg/free.svg#cil-trash"></use></svg></a>
                                    </td>
                                </tr>
                                @endforeach @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
