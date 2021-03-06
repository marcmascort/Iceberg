<?php

require_once ICEBERG_DIR_INCLUDES . 'frontend.php';

class IcebergFrontend extends Environment
{
    /**
     * Routing class name
     * @var string 
     */
    protected static $ROUTING_CLASS = 'RoutingFrontend';
    
    /**
     * Theme class name
     * @var string 
     */
    protected static $THEME_CLASS = 'ThemeFrontend';
    
    /**
     * Environment
     * @var array 
     */
    protected $environments = array(
        'home' => 'index.php',
        'content' => 'content.php',
        '404' => '404.php',
        'maintenance' => 'maintenance.php'
    );
    
    
    public function Load()
    {
        UserCapability::DisableApplyCapabilities();
        require_once ICEBERG_DIR_INCLUDES . 'RoutingFrontend.class.php';
        require_once ICEBERG_DIR_INCLUDES . 'ThemeFrontend.class.php';
        do_action('iceberg_frontend_load');
        return parent::Load();
    }
    
    public function Config()
    {
        if (is_null(Domain::GetID()))
        {
            $this->theme->SetDirectory(ICEBERG_DIR_INCLUDES, 'unknown');
            $this->environment = 'unknown';
            $this->environments = array(
                'unknown' => 'unknown.php'
            );
        }
        else if (Maintenance::InFrontendMode())
        {
            $this->environment = 'maintenance';
        }
        else
        {
            $this->environment = '404';
            $page_id = RoutingFrontend::GetRequestPage();
            if (is_null($page_id))
            {
                $this->environment = 'home';
            }
            else
            {
                $page = get_page($page_id);
                if ($page->id != -1)
                {
                    $this->environment = 'content';
                }
            }
        }
        do_action('iceberg_frontend_config');
        return parent::Config();
    }
    
    public function Generate()
    {
        /* Exec controllers */
        do_action('iceberg_frontend_generate');
        return parent::Generate();
    }
    
    public function Show()
    {
        do_action('iceberg_frontend_show');
        return parent::Show();
    }
    
    public static function ExecController($template)
    {
        if (is_file($template) && is_readable($template))
        {
            include $template;
            return true;
        }
        return false;
    }
}
