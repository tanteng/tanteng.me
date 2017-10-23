<?php
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
        if (Config::get('cdn.cdn_open')) {
            return Config::get('cdn.cdn_url') . $filepath;
        } else {
            return $filepath;
        }
    }
}