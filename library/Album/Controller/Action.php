<?php

abstract class Album_Controller_Action extends Zend_Controller_Action
{
    protected $obConfig;

    public function init()
    {
        $this->obConfig = $config = new Zend_Config_Ini(APPLICATION_PATH . '/configs/application.ini', 'general');

        set_include_path('.' . $this->obConfig->path->models
            . PATH_SEPARATOR . get_include_path());

        $db = Zend_Db::factory(
            $this->obConfig->db->adapter,
            $this->obConfig->db->config->toArray()   );
        Zend_Db_Table::setDefaultAdapter($db);




    }

}
