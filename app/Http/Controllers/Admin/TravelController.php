<?php
/**
 * Created by PhpStorm.
 * User: tanteng
 * Date: 16/5/8
 * Time: 14:43
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use App\Models\Travel;
use Illuminate\Http\Request;


class TravelController extends Controller
{
    public function __construct(Destination $destination, Travel $travel)
    {
        $this->middleware('auth:admin');
        $this->destination = $destination;
        $this->travel = $travel;
        $this->allDestination = $this->destination->getAllDestination();
    }

    public function create()
    {
        $destination = $this->allDestination;
        return view('admin.travel.create', compact('destination'));
    }

    //发布新游记
    public function postNew(Request $request)
    {
        $create = $this->travel->create($request->all());
        if ($create) {
            return redirect()->back();
        }
        return false;
    }

    //目的地管理
    public function destination()
    {
        $destination = $this->allDestination;
        return view('admin.travel.destination', compact('destination'));
    }


    //目的地添加编辑
    public function postDestinationSave(Request $request)
    {
        $isEdit = $request->input('isEdit');
        if ($isEdit) {
            $id = $request->input('id');
            $data['destination'] = $request->input('destination');
            $data['slug'] = $request->input('slug');
            $data['title'] = $request->input('title');
            $data['seo_title'] = $request->input('seo_title');
            $data['description'] = $request->input('description');
            $data['year'] = $request->input('year');
            $data['cover_image'] = $request->input('cover_image');
            $data['latest'] = $request->input('latest');
            $data['score'] = $request->input('score');
            $this->destination->where('id', $id)->update($data);
        } else {
            $this->destination->create($request->all());
        }

        return redirect()->back();
    }

    //目的地编辑
    public function destinationEdit($id)
    {
        $detail = $this->destination->find($id);
        $destination = $this->allDestination;
        return view('admin.travel.destination_edit', compact('destination', 'detail'));
    }
}