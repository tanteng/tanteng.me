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
use Illuminate\Http\Request;


class TravelController extends Controller
{
    public function __construct(Destination $destination)
    {
        $this->destination = $destination;
    }

    public function create()
    {
        return view('admin.travel.create');
    }

    public function postNew()
    {

    }

    //目的地管理
    public function destination()
    {
        return view('admin.travel.destination');
    }

    //目的地添加
    public function destinationAdd(Request $request)
    {
        $this->destination->create([
            'destination' => $request->input('destination'),
            'description' => $request->input('description'),
            'cover_image' => $request->input('cover_image_url'),
            'year' => $request->input('year'),
        ]);

        return redirect()->back();
    }
}