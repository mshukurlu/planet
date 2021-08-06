<?php
if(!function_exists('request_method')) {
    function request_method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }
}

if(!function_exists('dd'))
{
    function dd($parametrs)
    {
        var_dump($parametrs);
        exit();
    }
}

if(!function_exists('request_uri'))
{
   function request_uri()
   {
       return $_SERVER['REQUEST_URI'];
   }
}

if(!function_exists('not_found'))
{
    function not_found()
    {
        echo '404 NOT FOUND!';
        exit;
    }
}

if(!function_exists('csrf'))
{
    function csrf()
    {
        return \App\Parts\Security\Csrf\CsrfHandler::getToken();
    }
}

if(!function_exists('csrf_field'))
{
    function csrf_field()
    {
        return "<input type='hidden' name='csrf_token' value=".\App\Parts\Security\Csrf\CsrfHandler::getToken().">";
    }
}

