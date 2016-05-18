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
    public function travelList($destinationSlug)
    {
        $navFlag = 'travel';

        $rs = $this->destination->where('slug', $destinationSlug)->first(['id', 'destination', 'seo_title']);
        $destinationId = $rs->id;
        if (!$destinationId) {
            abort(404);
        }
        $destination = $rs->destination;
        $seoTitle = $rs->seo_title;

        $seoSuffix = "_tanteng.me";
        $lists = $this->travel->travelList($destinationId);
        return view('travel.destination', compact('navFlag', 'lists', 'destination', 'destinationSlug', 'seoTitle', 'seoSuffix'));
    }

    //游记详情
    public function travelDetail($destinationSlug, $slug)
    {
        $navFlag = 'travel';

        $destinationList = $this->destination->getList();
        $destination = $this->destination->where('slug', $destinationSlug)->value('destination');
        $seoSuffix = "_{$destination}游记_tanteng.me";
        $detail = $this->travel->where('slug', $slug)->firstOrFail();
        $sid = 'travel-' . $destinationSlug . '-' . $detail->id; //travel-hongkong-1
        return view('travel.detail', compact('navFlag', 'detail', 'destinationList', 'destination', 'destinationSlug', 'slug', 'seoSuffix', 'sid'));
    }
}