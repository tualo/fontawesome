<?php
namespace Tualo\Office\FontAwesome\Routes;
use Tualo\Office\Basic\TualoApplication as App;
use Tualo\Office\Basic\Route as BasicRoute;
use Tualo\Office\Basic\IRoute;


class PublicRoute implements IRoute{
    public static function register(){
        BasicRoute::add('/fontawesome/(?P<file>[\/.\w\d\-\_\.]+)'.'',function($matches){
            if (file_exists( dirname(__DIR__,2).'/lib/'.$matches['file']) ){
                App::etagFile( dirname(__DIR__,2).'/lib/'.$matches['file'] , true);
                BasicRoute::$finished = true;
                http_response_code(200);
            }
        },['get'],false);

        // /tualocms/page/fontawesome/free/css/all.min.css
        BasicRoute::add('/tualocms/page/fontawesome/(?P<file>[\/.\w\d\-\_\.]+)'.'',function($matches){
            if (file_exists( dirname(__DIR__,2).'/lib/'.$matches['file']) ){
                App::etagFile( dirname(__DIR__,2).'/lib/'.$matches['file'] , true);
                BasicRoute::$finished = true;
                http_response_code(200);
            }
        },['get'],false);

    }
}