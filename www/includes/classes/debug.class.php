<?php

/**
 * Created by PhpStorm.
 * @author albert
 * Date: 1/18/16
 * Time: 3:50 AM
 */
CLASS debug EXTENDS add_debug {

   static $log = "";

   public static function log($log) {

      $log = $log."\r\n";
      static::$log .= $log;

      echo $log;

   }
}