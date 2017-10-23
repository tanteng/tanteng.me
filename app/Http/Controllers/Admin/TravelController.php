<?php

namespace App\Http\Controllers\Admin;

use App\Models\Destination;
use App\Models\Travel;
use Illuminate\Http\Request;

class TravelController extends AdminController
{
    /**
     * 旅游目的地
     * @var \Illuminate\Support\Collection
     */
    private $destinationList;

    public function __construct()
    {
        parent::__construct();
        $this->destinationList = Destination::orderBy('id', 'asc')->pluck('destination', 'id');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $destinationList = $this->destinationList;
        $travels = Travel::orderBy('begin_date', 'desc')->paginate(20);
        $count = [
            'all' => Travel::count(),
        ];
        return view('admin.travel.list', compact('travels', 'destinationList', 'count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $destinationList = $this->destinationList;
        return view('admin.travel.add', compact('destinationList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->merge(['slug' => str_slug($request->slug)]);
        Travel::create($request->all());

        $this->updateLatest($request->destination_id);

        return redirect()->route('travel.index')->with('info', '添加成功!');
    }

    /**
     * 更新目的地最新游记时间
     * @param $destinationId
     * @return bool
     */
    private function updateLatest($destinationId)
    {
        $latestDate = Travel::where('destination_id', $destinationId)->orderBy('end_date', 'desc')->first(['end_date']);
        Destination::where('id', $destinationId)->update(['latest' => $latestDate->end_date]);
        return true;
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
        $destinationList = $this->destinationList;
        $travel = Travel::findOrFail($id);
        return view('admin.travel.edit', compact('travel', 'destinationList'));
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
        $request->merge(['slug' => str_slug($request->slug)]);
        Travel::where('id', $id)->update($request->except(['_token', '_method']));

        $this->updateLatest($request->destination_id);

        return redirect()->route('travel.index')->with('info', '编辑成功!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $travel = Travel::findOrFail($id);
        $result = $travel->delete();
        if ($result) {
            return response()->json(['result' => 0, 'msg' => '删除成功!', 'data' => []]);
        }
        return response()->json(['result' => 1001, 'msg' => '删除失败!', 'data' => []]);
    }
}
