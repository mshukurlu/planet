<?php


namespace App\Parts\views;


class View
{
      public static function render($view,$values = array())
      {
          $fullPath = BASE_DIR.'themplates/views/'.$view.'.php';

          if(!file_exists($fullPath))
          {
           throw new \Error('Fayl tapılmadı '.$fullPath);
          }
          extract($values);
          include ($fullPath);
      }
}
