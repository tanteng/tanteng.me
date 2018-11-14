<?php

namespace App\Http\Controllers;


use App\Http\Services\VodEncryptService;
use Illuminate\Http\Request;

class VodController extends Controller
{
    protected $vodEncryptService;

    public function __construct(VodEncryptService $service)
    {
        $this->vodEncryptService = $service;
    }

    public function testVod(Request $request)
    {
        $fileId = $request->get('fileId');

        $result = $this->vodEncryptService->ProcessFile([
            'fileId' => $fileId,
            'transcode.definition.0' => 220,
            'transcode.definition.1' => 230, //可以定义多个码率，生成不同的清晰度视频
            'transcode.drm.definition' => 10,
            'notifyMode' => 'Finish', //当任务流全部执行完成，才发起一次事件通知
        ]);

        dump($result);
        dump($this->vodEncryptService->module->getLastRequest());
        dump($this->vodEncryptService->module->getLastResponse());
    }

    public function getkey(Request $request)
    {
        $edk = $request->get('edk');
        $fileId = $request->get('fileId');
        $result = $this->vodEncryptService->DescribeDrmDataKey([
            'edkList.0' => $edk,
        ]);

        dump($result);
        dump($this->vodEncryptService->module->getLastRequest());
        dump($this->vodEncryptService->module->getLastResponse());
    }
}