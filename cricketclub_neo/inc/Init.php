<?php
/**
 * Name All Init file
 * @package cricketclub_neo
 */

 namespace Inc;


 final class Init{

    public static function get_servicess(){
        return [
            Base\Enqueue::class,
            Pages\Dashboard::class,
            Base\SettingsLinks::class,
            Base\CustomPostTypeController::class,
            Base\TaxonomyController::class
            
        ];
    }

     public static function register_servicess(){
         foreach (self::get_servicess() as $class){
             $service = self::instantiate($class);

             if(method_exists($service, 'register')){
                 $service->register();
             }
         }
     }

     private static function instantiate($class){
         $service = new $class();
         return $service;
     }
 }
