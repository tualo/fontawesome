<?php

namespace Tualo\Office\FontAwesome\Middlewares;
use Tualo\Office\Basic\TualoApplication;
use Tualo\Office\Basic\IMiddleware;
use Tualo\Office\ExtJSCompiler\AppJson;

class Middleware implements IMiddleware{
    public static function register(){
        TualoApplication::use('fontawesome',function(){
            try{
                TualoApplication::stylesheet("./fontawesome/6.7.1/css/all.min.css" );

            }catch(\Exception $e){
                TualoApplication::set('maintanceMode','on');
                TualoApplication::addError($e->getMessage());
            }
        },-10000); // should be one of the last
    }
}