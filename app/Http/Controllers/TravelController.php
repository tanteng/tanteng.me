<?php
/**
 * Created by PhpStorm.
 * User: tanteng
 * Date: 16/5/8
 * Time: 13:46
 */

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;

class TravelController extends Controller
{
    public function __construct(Destination $destination)
    {
        $this->destination = $destination;
    }

    public function index()
    {
        $navFlag = 'travel';

        $lists = $this->destination->getList();
        return view('travel.index', compact('navFlag','lists'));
    }

    //目的地游记列表
    public function destinationList($destination)
    {
        $id = $this->destination->where('slug', $destination)->value('id');
        if (!$id) {
            abort(404);
        }
        $list = $this->destination->find($id)->travel()->paginate(10);
        dump($list);
        $total = $list->total();
    }

    public function destination(Request $request)
    {
        $list = $this->destination->paginate(10);
        dump($list);
    }
}