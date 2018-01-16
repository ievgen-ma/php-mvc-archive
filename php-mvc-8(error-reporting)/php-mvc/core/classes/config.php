<?php
class Config {
    private static $_instance;
    private $_configs = array();

    public static function instance(){
        if(empty(self::$_instance)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function set($name, $value){
        $this->_configs[$name] = $value;
    }

    public function get($name) {
        return $this->_configs[$name];
    }
}