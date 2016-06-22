<?php
/*
 * This file is part of tanteng.me
 *
 * (c) tanteng <tanteng@qq.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

if (!function_exists('cdn')) {
    /**
     * Create a new cdn url.
     *
     * @param string|null $filepath
     *
     * @return string
     */
    function cdn($filepath = '')
    {
        if (Config::get('app.cdn_open')) {
            return Config::get('app.cdn') . $filepath;
        } else {
            return $filepath;
        }
    }
}