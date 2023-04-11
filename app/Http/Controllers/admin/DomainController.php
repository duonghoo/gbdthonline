<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Request;
use Redirect;
use App\Models\Domain;
use Route;

class DomainController extends Controller
{
    public function __construct()
    {

    }

    public function index() {
        $listItem = Domain::all();
        $data['listItem'] = $listItem;
        return view('admin.domain.index', $data);
    }

    public function update($id = 0) {
        $data['oneItem'] = Domain::where('id',$id)->first();
        if (!empty(Request::post())) {
            Domain::updateOrInsert(['id' => $id], Request::post());
            return Redirect::to('/admin/domain');
        }
        return view('admin.domain.update', $data);
    }

    public function delete($id) {
        Domain::destroy($id);
        return back();
    }
}
