<?php

/**
 * Created by PhpStorm.
 * @author albert
 * Date: 1/18/16
 * Time: 5:17 AM
 */
CLASS locust_mule_adodb EXTENDS add_adodb_mysql {
   public function Connect() {
      $this->adodb->Connect( $this->mysql_host, $this->mysql_username, $this->mysql_password, $this->mysql_db_name );
      return $this;
   }

   /**
    * varname()
    * @since Reload 0.0
    */
   public static function varname() {
      return self::VARNAME;
   }
}