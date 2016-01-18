<?php

/**
 * Created by PhpStorm.
 * @author albert
 * Date: 1/18/16
 * Time: 5:17 AM
 */
CLASS source_target_adodb EXTENDS add_adodb {
   /**
    */
   public function Connect() {
      return call_user_func_array(array($this->adodb,'Connect'),func_get_args());
   }
}