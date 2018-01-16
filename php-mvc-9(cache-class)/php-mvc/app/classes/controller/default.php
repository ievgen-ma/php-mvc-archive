<?php
class Controller_Default
{
    public function main()
    {
        $cache = Cache::instance();
        $data = $cache->get($_SERVER['REQUEST_URI'].'[:menu:]');
        if (!$data) {
            $cache->set($_SERVER['REQUEST_URI'].'[:menu:]', array(0 => '123', 1 => '456'));   
        }
        var_dump($data);

        unset($cache);

    }
}
