<?php

use App\Models\Page;

function snake_to_camel($input)
{
    return str_replace('_', '', ucwords($input, '_'));
}

if (!function_exists('replaseExtension')) {
    function replaseExtension($path = '', $ext = '')
    {
        if (!$path || !$ext) {
            return false;
        }
        $dirname = pathinfo($path, PATHINFO_DIRNAME);
        $filename = pathinfo($path, PATHINFO_FILENAME);

        return "{$dirname}/{$filename}.{$ext}";
    }
}

if (!function_exists('wp_normalize_path')) {
    function wp_normalize_path($path)
    {
        $path = str_replace('\\', '/', $path);
        $path = preg_replace('|/+|', '/', $path);
        return $path;
    }
}

if (!function_exists('classActivePath')) {
    function classActivePath($path, $work)
    {
        if (Request::is('why-how') == true || Request::is('why-what') == true) {
            if ($path == 'why-why') {
                $path = true;
            }
            $path? ' class="active"' : '';
        }
        if ($work == true) {
            if ($path == 'our-works') {
                $path = true;
            }
            $path? ' class="active"' : '';
        }
        return Request::is($path) ? ' class="active"' : '';
    }
}
