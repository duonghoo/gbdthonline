@extends('admin.layout')
@section('content')
    <main class="c-main bg-white">
        <div class="container-fluid">
            <div class="fade-in">
                <form method="post" action="">
                    <div class="row">
                        <div class="col-md-8 pr-0 border-bottom">
                          <h1>Domain</h1>
                        </div>
                        <div class="col-md-4 border-bottom">
                            <button type="submit" class="btn btn-primary float-right">Lưu trữ</button>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active" id="seo" role="tabpanel">
                            <div class="row py-2">
                                <div class="col-sm-8">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label>Tên website</label>
                                                        <input class="form-control" required name="name" value="{!! !empty($oneItem->name) ? $oneItem->name : '' !!}" type="text" placeholder="Tên website">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Domain</label>
                                                        <input id="full-featured" class="form-control" name="link" value="{{!empty($oneItem->link) ? $oneItem->link : ''}}" placeholder="Link domain">
                                                    </div>
                                                    <label>Active</label>
                                                    <select name="active" class="form-control">
                                                        <option {{isset($oneItem->active) && $oneItem->active == 'dofollow' ? 'selected' : ''}} value="dofollow">active</option>
                                                        <option {{isset($oneItem->active) && $oneItem->active == 'nofollow'? 'selected' : ''}} value="nofollow">inactive</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
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
