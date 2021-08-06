<?php


if(!function_exists('include_view')) {
    function include_view($name)
    {
        include "../themplates/views/".$name.'.php';
    }
}
