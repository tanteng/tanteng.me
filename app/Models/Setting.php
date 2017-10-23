<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Setting
 * @mixin \Eloquent
 * @package App\Models
 */
class Setting extends Model
{
    protected $fillable = [
        'key',
        'display_name',
        'value',
        'details',
        'type',
        'order',
    ];

    /**
     * 获取设置项
     * @param $key
     * @return mixed
     */
    public static function getSettingsByKey($key)
    {
        return self::where('key', $key)->value('value');
    }
}
