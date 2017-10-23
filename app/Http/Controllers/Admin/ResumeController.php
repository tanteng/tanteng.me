<?php

namespace App\Http\Controllers\Admin;

use App\Models\Resume;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ResumeController extends AdminController 
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resume = Resume::orderBy('id', 'desc')->first();
        if (!$resume) {
            $resume = (object)[
                'id'      => 1,
                'title'   => '',
                'desc'    => '',
                'content' => '',
                'status'  => '',
                'version' => '',
            ];
        }
        return view('admin.resume.index', compact('resume'));
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
        //
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
        //
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
        $resume = Resume::find($id);
        $request->merge(['version' => date('YmdHis')]);
        if (!$resume) {
            Resume::create($request->all());
            return redirect()->route('resume.index')->with('info', '发布成功!');
        }

        Resume::where('id', $id)->update($request->except(['_token', '_method']));

        return redirect()->route('resume.index')->with('info', '修改成功!');
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
