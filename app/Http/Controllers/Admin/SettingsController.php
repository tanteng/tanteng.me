<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::orderBy('order', 'asc')->get();
        return view('admin.settings.settings', compact('settings'));
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
        $this->validate($request, [
            'display_name' => 'required|max:255|unique:settings',
            'key'          => 'required',
            'value'        => 'required',
            'order'        => 'required|integer',
        ]);
        $request->merge(['type' => 'text', 'details' => '']);
        Setting::create($request->all());

        return back()->with('info', '添加配置成功!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $setting = Setting::findOrFail($id);
        return view('admin.settings.edit', compact('setting'));
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
        $this->validate($request, [
            'display_name' => 'required|max:255|unique:settings,display_name,' . $id,
            'key'          => 'required|unique:settings,key,' . $id,
            'value'        => 'required',
            'order'        => 'required|integer',
        ]);
        $request->merge(['type' => 'text']);
        Setting::where('id', $id)->update($request->except(['_token', '_method']));

        return redirect()->route('settings.index')->with('info', '修改成功!');
    }

    /**
     * 批量更新设置
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateAll(Request $request)
    {
        $all = $request->all();
        $keys = $all['key'];
        foreach ($keys as $key => $value) {
            Setting::where('key', $key)->update(['value' => $value]);
        }
        return back()->with('info', '保存设置成功!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $setting = Setting::findOrFail($id);
        $result = $setting->delete();
        if ($result) {
            return response()->json(['result' => 0, 'msg' => '删除成功!', 'data' => []]);
        }
        return response()->json(['result' => 1001, 'msg' => '删除失败!', 'data' => []]);
    }
}
