<?php

/** Include helpers taxonomy file */
require_once ICEBERG_DIR_HELPERS . 'pagetype.php';

class PageType extends ObjectTaxonomy
{
    /**
     * Configuration key
     * @var string
     */
    public static $TAXONOMY_KEY = 'pagetype';
    
    protected $name = '';
    
    
    public function __construct($name='') {
        $this->SetName($name);
    }
    
    public function GetName()
    {
        return $this->name;
    }
    
    public function SetName($name)
    {
        return $this->name = $name;
    }
}