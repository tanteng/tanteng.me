<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Options;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    //封面自我介绍修改页面
    public function coverEdit()
    {
        $introduce = Options::where('name', 'introduce')->value('value');
        return view('admin.settings.cover', compact('introduce'));
    }

    //封面自我介绍更新
    public function coverUpdate(Request $request)
    {
        $data['name'] = 'introduce';
        $data['value'] = $request->input('introduce');
        $instance = Options::updateOrCreate(['name' => 'introduce'], $data);
        if (false !== $instance) {
            return redirect()->back();
        }
    }
}
