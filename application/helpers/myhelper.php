<?php

if (!function_exists('echo_r')) {
    function echo_r($value = '')
    {
        echo '<pre>';
        print_r($value);
        echo '</pre>';
    }
}

if (!function_exists('echo_rr')) {
    function echo_rr($value = '')
    {
        echo '<pre>';
        var_dump($value);
        echo '</pre>';
    }
}
