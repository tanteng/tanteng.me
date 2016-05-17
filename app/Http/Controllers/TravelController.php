<?php
/**
 * Created by PhpStorm.
 * User: tanteng
 * Date: 16/5/8
 * Time: 13:46
 */

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Travel;
use Illuminate\Http\Request;

class TravelController extends Controller
{
    public function __construct(Destination $destination, Travel $travel)
    {
        $this->destination = $destination;
        $this->travel = $travel;
    }

    //旅行栏目首页，列出所有目的地，链接指向目的地最新游记
    public function index()
    {
        $navFlag = 'travel';

        $lists = $this->destination->getList();
        return view('travel.index', compact('navFlag', 'lists'));
    }

    //目的地游记列表
    public function travelList($destination)
    {
        $navFlag = 'travel';

        $destinationId = $this->destination->where('slug', $destination)->value('id');
        if (!$destinationId) {
            abort(404);
        }
        $lists = $this->travel->travelList($destinationId);
        return view('travel.destination', compact('navFlag', 'lists'));
    }

    //游记详情
    public function travelDetail($destinationSlug, $slug)
    {
        $navFlag = 'travel';

        $destinationList = $this->destination->getList();
        $destination = $this->destination->where('slug', $destinationSlug)->value('destination');
        $seoSuffix = "_{$destination}游记_tanteng.me";
        $detail = $this->travel->where('slug', $slug)->firstOrFail();
        return view('travel.detail', compact('navFlag', 'detail', 'destinationList', 'destinationSlug', 'slug', 'seoSuffix'));
    }
}