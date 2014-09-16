<?php

class TE_Check extends TaxonomyElements
{
    protected static $NAME = 'Checkbox';
    protected $default = true;
    
    function __construct($args=array())
    {
        $this->limit = isset($args['limit']) ? $args['limit'] : 0;
        parent::__construct($args);
    }
    
    public function FormConfig()
    {
        ?>
        <p>
            <label class="checkbox" for="default-<?php print $this->GetAttrName(); ?>">
                <input type="checkbox" name="default-<?php print $this->GetAttrName(); ?>" id="default-<?php print $this->GetAttrName(); ?>" value="1" <?php print $this->default ? 'checked' : ''; ?> />
                Default status
            </label>
            
        </p>
        <?php
        parent::FormConfig();
    }
    
    public function SaveFormConfig($args = array())
    {
        $this->default = isset($args['default']) ? (bool)$args['default'] : (bool)get_request_p('default-'.$this->GetAttrName(), false);
        parent::SaveFormConfig($args);
    }
    
    public function FormEdit($page) {
        $checked = $page->GetMeta($this->GetAttrName());
        $checked = !$checked  ? ($this->default ? 1 : 0) : $checked;
        ?>
        <input type="checkbox" name="checkbox-<?php print $this->GetAttrName(); ?>-<?php print $this->GetTaxonomy(); ?>" id="checkbox-<?php print $this->GetAttrName(); ?>-<?php print $this->GetTaxonomy(); ?>" value="1" <?php print $checked==1 ? 'checked' : ''; ?> />
        <?php
        parent::FormEdit($page);
    }
    
    public function GetFormEdit($args=array())
    {
        return isset($args[$this->GetAttrName()]) ? $args[$this->GetAttrName()] : get_request_p('checkbox-'.$this->GetAttrName().'-'.$this->GetTaxonomy(), '0', true);
    }
    
    public function SaveFormEdit($page_id, $args=array(), $lang=null)
    {
        return Page::InsertUpdateMeta($page_id, $this->GetAttrName(), $this->GetFormEdit($args), $lang);
    }
    
    
    
    static public function CleanPrintString($str)
    {
        $str = str_replace('%','', $str);
        return $str;
    }
}
