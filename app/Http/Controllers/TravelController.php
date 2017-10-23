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
use Cache;

class TravelController extends Controller
{
    /**
     * 缓存时间
     */
    const CACHE_TIME = 300;

    /**
     * 目的地模型
     * @var Destination
     */
    private $destination;

    /**
     * 游记模型
     * @var Travel
     */
    private $travel;

    /**
     * 构造函数注入
     * @param Destination $destination
     * @param Travel $travel
     */
    public function __construct(Destination $destination, Travel $travel)
    {
        $this->destination = $destination;
        $this->travel = $travel;
        view()->share(['navFlag' => 'travel']);
    }

    /**
     * 游记首页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = Cache::remember('travel.index', self::CACHE_TIME, function () {
            $destinationList = $this->destination->getList();
            $travelList = $this->travel->latestTravel(12);
            $travelNums = $this->travel->getTravelNumsGroupByDestination();
            return [
                'destinationList' => $destinationList,
                'travelList'      => $travelList,
                'travelNums'      => $travelNums
            ];
        });
        return view('travel.index', $data);
    }

    /**
     * 全部游记
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function latest()
    {
        $data = Cache::remember('travel.latest', self::CACHE_TIME, function () {
            $travelList = $this->travel->latest('begin_date')->paginate(20);
            return [
                'travelList' => $travelList,
            ];
        });
        $travelList = $data['travelList'];
        $seoSuffix = '_tanteng.me';
        return view('travel.latest', compact('travelList', 'seoSuffix'));
    }

    /**
     * 目的地游记列表
     * @param $destinationSlug string
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function travelList($destinationSlug)
    {
        $destinationInfo = $this->destination->getDestinationBySlug($destinationSlug);
        $travelList = $this->travel->travelListByDestinationId($destinationInfo['id']);

        $seoSuffix = "_tanteng.me";
        return view('travel.destination', compact('travelList', 'destinationInfo', 'seoSuffix'));
    }

    /**
     * 游记详情
     * @param $slug string
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function travelDetail($slug)
    {
        $destinationList = $this->destination->getList(); //目的地列表
        $detail = $this->travel->detailInfo($slug); //游记内容
        $destinationInfo = $destinationList[$detail['destination_id']]; //对应目的地信息
        $destinationCount = $this->travel->getTravelNumsGroupByDestination(); //目的地和游记数量
        $travelList = $this->travel->travelListById($detail['id'], $detail['destination_id'], 5); //更多游记

        $seoSuffix = "_{$destinationInfo['destination']}游记_tanteng.me";

        return view('travel.detail', compact('detail', 'destinationList', 'destinationInfo', 'destinationCount', 'travelList', 'seoSuffix'));
    }
}