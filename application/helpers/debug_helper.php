<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('dd'))
{
    function dd($value) {
        echo "<pre>";
        print_r($value);
        echo "<pre>";
        exit;
    }
}
?>