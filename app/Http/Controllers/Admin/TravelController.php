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
        $this->middleware('auth:admin');
        $this->destination = $destination;
        $this->allDestination = $this->destination->getAll();
    }

    public function create()
    {
        $destination = $this->allDestination;
        return view('admin.travel.create', compact('destination'));
    }

    public function postNew(Request $request)
    {
        dd($request);
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
            'score'=>$request->input('score'),
        ]);

        return redirect()->back();
    }
}