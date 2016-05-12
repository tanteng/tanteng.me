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
        $this->allDestination = $this->destination->getAll();
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

    //目的地添加
    public function destinationAdd(Request $request)
    {
        $this->destination->create([
            'destination' => $request->input('destination'),
            'description' => $request->input('description'),
            'cover_image' => $request->input('cover_image_url'),
            'year' => $request->input('year'),
            'score' => $request->input('score'),
        ]);

        return redirect()->back();
    }
}