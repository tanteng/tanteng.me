<?php

namespace App\Http\Services;


class VodEncryptService
{
    public $module;

    public function __construct()
    {
        $this->module = \QcloudApi::load('vod', [
            'SecretId' => 'AKIDqbDf1DagpofMsGRdcSI7oLk04xsgqxUv',
            'SecretKey' => 'Vq8NSMDsY9av54ua7UhgV9dwHSczNbeZ',
        ]);
    }

    /**
     * 视频转码加密
     * @param $params
     * @return mixed
     */
    public function ProcessFile($params)
    {
        try {
            $result = $this->module->ProcessFile($params);
        } catch (\Exception $e) {
            \Log::error('视频转码加密失败：' . $e->getMessage());
        }
        return $result;
    }

    /**
     * 获取视频解密秘钥
     * @param $params
     * @return mixed
     */
    public function DescribeDrmDataKey($params)
    {
        try {
            $result = $this->module->DescribeDrmDataKey($params);
        } catch (\Exception $e) {
            \Log::error('获取视频解密秘钥失败：' . $e->getMessage());
        }
        return $result;
    }

}