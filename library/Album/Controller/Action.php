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

        //setup new view object and view helper
        $view = new Album_View_Smarty();
        $view->setScriptPath($this->obConfig->smarty->template_dir);
        $view->setCompilePath($this->obConfig->smarty->compile_dir);
        $view->setCachePath($this->obConfig->smarty->cache_dir);
        $view->setConfigPath($this->obConfig->smarty->config_dir);
        $this->view = $view;

        $viewRenderer = Zend_Controller_Action_HelperBroker::getStaticHelper('viewRenderer');
        $viewRenderer
            ->setView($view)
            ->setViewSuffix('tpl');

        //use layout view pattern
        $layout = Zend_Layout::startMvc();
        $layout->setViewSuffix('tpl');
        $view->assign( 'layout', $layout );



    }

}
