<?php

namespace App\Http\Controllers\Admin;

use App\Models\Destination;
use App\Models\Travel;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class TravelController extends Controller
{
    public function __construct(Destination $destination, Travel $travel)
    {
        $this->middleware('auth:admin');
        $this->destination = $destination;
        $this->travel = $travel;
        $this->allDestination = $this->destination->getAllDestination();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lists = $this->travel->latest('id')->paginate(20);
        return view('admin.travel.index', compact('lists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $destination = $this->allDestination;
        return view('admin.travel.create', compact('destination'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $create = $this->travel->create($request->all());
        if ($create) {
            return redirect()->back();
        }
        return false;
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $detail = $this->travel->findOrFail($id);
        $destination = $this->destination->latest('id')->lists('destination', 'id');
        return view('admin.travel.edit', compact('id', 'detail', 'destination'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data['title'] = $request->input('title');
        $data['seo_title'] = $request->input('seo_title');
        $data['destination_id'] = $request->input('destination_id');
        $data['slug'] = $request->input('slug');
        $data['description'] = $request->input('description');
        $data['cover_image'] = $request->input('cover_image');
        $data['begin_date'] = $request->input('begin_date');
        $data['end_date'] = $request->input('end_date');
        $data['content'] = $request->input('content');
        $data['score'] = $request->input('score');
        Cache::pull('travel.detail.' . $data['destination_id'] . $data['slug']);
        $this->travel->where('id', $id)->update($data);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
