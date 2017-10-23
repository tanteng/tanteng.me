<?php

namespace App\Http\Controllers\Api;

use App\Models\Destination;
use App\Models\Resume;
use App\Models\Setting;
use App\Models\Travel;
use App\Models\WpPost;
use Cache;
use DB;
use Dingo\Api\Routing\Helpers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WechatController extends Controller
{
    use Helpers;

    /**
     * 一句话介绍
     * @return mixed
     */
    public function profile()
    {
        $profile = Cache::remember('api:profile', 5, function () {
            return Setting::where('key', 'index.profile')->value('value');
        });
        return $profile;
    }

    public function resume()
    {
        $first = Resume::select(['title', 'content'])->first()->toArray();
        return $first;
    }

    /**
     * 小程序旅行首页目的地列表接口
     * @param Destination $destination
     * @return mixed
     */
    public function destination()
    {
        $data = Cache::remember('api:destination.list', 5, function () {
            $destination = Destination::select(['id', 'destination', 'description', 'cover_image', 'total', 'slug'])
                ->orderBy('latest', 'desc')->get()->toArray();
            return $destination;
        });

        return $data;
    }

    /**
     * 目的地的游记列表
     * @param Request $request
     * @return array
     */
    public function travelByDes(Request $request)
    {
        $desId = $request->get('id');
        $desName = Destination::where('id', $desId)->value('destination');
        $data = Cache::remember('api:travel.list.by.destination.id.' . $desId, 5, function () use ($desId, $desName) {
            $travel = Travel::select(['id', 'destination_id', 'title', 'description', 'cover_image', 'begin_date', 'slug'])
                ->where('destination_id', $desId)
                ->orderBy('begin_date', 'desc')->get();

            foreach ($travel as $item) {
                $item->des_name = $desName;
                $item->time_before = $item->begin_date->diffForHumans();
            }
            return $travel->toArray();
        });

        return $data;
    }

    /**
     * 小程序游记详情接口
     * @param Request $request
     * @return array
     */
    public function travelDetail(Request $request)
    {
        $id = $request->id;
        if (!$id) {
            $this->response->errorBadRequest();
        }

        return Cache::remember('api:travel.detail.id.' . $id, 5, function () use ($id) {
            $detail = Travel::select(['id', 'destination_id', 'title', 'content', 'begin_date', 'slug'])
                ->findOrFail($id);
            $detail->time_before = $detail->begin_date->diffForHumans();

            $desName = Destination::where('id', $detail['destination_id'])->value('destination');
            $detail->des_name = $desName;
            return $detail->toArray();
        });
    }

    public function loading()
    {
        $travelLatest = Travel::select(['id', 'destination_id', 'title', 'content', 'begin_date', 'slug'])
            ->orderBy('begin_date', 'desc')->get();

        foreach ($travelLatest as $item) {
            $item->time_before = $item->begin_date->diffForHumans();
        }

        return [

        ];
    }
}

