<?php

/** Include helpers taxonomy file */
require_once ICEBERG_DIR_HELPERS . 'pagegroup.php';

class PageGroup extends ObjectTaxonomy
{
    /**
     * Configuration key
     * @var string
     */
    public static $TAXONOMY_KEY = 'pagegroup';
    
    protected $type;
    
    public function __construct($args=array()) {
        $this->type = isset($args['type']) ? $args['type'] : array();
        $this->type = is_array($this->type) ? $this->type : explode(',', $this->type);
        parent::__construct($args);
    }
    
    public function GetType()
    {
        return $this->type;
    }
    
    public function SetType($type)
    {
        $this->type = is_array($type) ? $type : explode(',', $type);
    }
    
    public function AcceptedType($id)
    {
        return in_array($id, $this->type);
    }
    
    public function GetTypeObject()
    {
        $args = array(
            'id' => $this->type
        );
        return PageType::GetList($args);
    }
    
    public function GetTaxonomy()
    {
        $taxonomy = array();
        $types = $this->GetTypeObject();
        foreach ($types AS $type)
        {
            $buffer = $type->GetTaxonomy();
            $taxonomy = array_merge($taxonomy, $buffer);
        }
        return $taxonomy;
    }
    
    public function GetTaxonomyObjects()
    {
        $args = array(
            'id' => $this->GetTaxonomy()
        );
        return PageTaxonomy::GetList($args);
    }
}
