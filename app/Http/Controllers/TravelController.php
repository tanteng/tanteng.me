<?php
/**
 * Created by PhpStorm.
 * User: tanteng<tanteng@qq.com>
 * Date: 16/5/8
 * Time: 13:46
 */

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Travel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class TravelController extends Controller
{
    public function __construct(Destination $destination, Travel $travel)
    {
        $this->destination = $destination;
        $this->travel = $travel;
        view()->share(['navFlag' => 'travel']);
    }

    //旅行栏目首页，列出所有目的地，链接指向目的地最新游记
    public function index()
    {
        $lists = Cache::remember('travel.destination.lists', 20, function () {
            return $this->destination->getList();
        });
        return view('travel.index', compact('lists'));
    }

    //目的地游记列表
    public function travelList($destinationSlug)
    {
        $data = Cache::remember("travel.destination.list.{$destinationSlug}", 30, function () use ($destinationSlug) {
            $destinationInfo = $this->destination->where('slug', $destinationSlug)->first(['id', 'destination', 'seo_title', 'description', 'slug']);
            if (!$destinationInfo['id']) {
                abort(404);
            }
            $list = $this->travel->travelList($destinationInfo['id']);
            return [
                'lists' => $list,
                'destinationInfo' => $destinationInfo,
            ];
        });

        $lists = $data['lists'];
        $destinationInfo = $data['destinationInfo'];

        $seoSuffix = "_tanteng.me";
        return view('travel.destination', compact('lists', 'destinationInfo', 'seoSuffix'));
    }

    //游记详情
    public function travelDetail($destinationSlug, $slug)
    {
        //缓存DB数据
        $data = Cache::remember("travel.detail.{$destinationSlug}.{$slug}", 30, function () use ($destinationSlug, $slug) {
            $destinationList = $this->destination->getList();
            $destinationInfo = $this->destination->where('slug', $destinationSlug)->first(['id', 'destination']);
            $detail = $this->travel->where('slug', $slug)->firstOrFail();
            $relation = $this->travel->where('destination_id', $destinationInfo['id'])
                ->where('id', '<>', $detail->id)->get();
            return [
                'destinationList' => $destinationList,
                'destinationInfo' => $destinationInfo,
                'detail' => $detail,
                'relation' => $relation,
            ];
        });

        $destinationList = $data['destinationList'];
        $destinationInfo = $data['destinationInfo'];
        $detail = $data['detail'];
        $destination = $destinationInfo->destination;
        $seoSuffix = "_{$destination}游记_tanteng.me";

        return view('travel.detail', compact('detail', 'destinationList', 'destination', 'destinationSlug', 'slug', 'seoSuffix', 'sid'));
    }
}