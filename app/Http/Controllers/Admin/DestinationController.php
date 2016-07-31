<?php

namespace App\Http\Controllers\Admin;

use App\Models\Destination;
use App\Models\Travel;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class DestinationController extends Controller
{
    public function __construct(Destination $destination, Travel $travel)
    {
        $this->middleware('auth:admin');
        $this->destination = $destination;
        $this->travel = $travel;
        $this->allDestination = $this->destination->all();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $destination = $this->allDestination;
        return view('admin.travel.destination', compact('destination'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->destination->create($request->all());
        return redirect()->back();
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
        $destination = $this->allDestination;
        $detail = $this->destination->find($id);
        return view('admin.travel.destination_edit', compact('id', 'destination', 'detail'));
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
        Cache::forget('travel.destination.lists');
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
