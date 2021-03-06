<?php

class TE_Text extends TaxonomyElements
{
    protected static $NAME = 'Text';
    protected $wysiwing = true;
    
    function __construct($args=array())
    {
        $this->wysiwing = isset($args['wysiwing']) ? $args['wysiwing'] : true;
        parent::__construct($args);
    }
    
    public function UseWysiwing($use=null)
    {
        if (is_null($use))
        {
            return $this->wysiwing;
        }
        else
        {
            return $this->wysiwing = $use;
        }
    }
    
    public function FormConfig()
    {
        parent::FormConfig();
        ?>
        <p class="radio">
            <label for="wysiwing-<?php print $this->GetAttrName(); ?>" class="checkbox">
                <input type="checkbox" name="wysiwing-<?php print $this->GetAttrName(); ?>" id="wysiwing-<?php print $this->GetAttrName(); ?>" value="1" <?php print $this->UseWysiwing() ? 'checked' : ''; ?> /> <?php print_text('Use wysiwing editor'); ?>
            </label>
        </p>
        <?php
    }
    
    public function SaveFormConfig($args = array())
    {
        $this->UseWysiwing(isset($args['wysiwing']) ? $args['wysiwing'] : get_request_p('wysiwing-'.$this->GetAttrName(), false));
        parent::SaveFormConfig($args);
    }
    
    public function FormEdit($page) {
        ?>
        <div class="form-group">
            <label for="text-<?php print $this->GetAttrName(); ?>-<?php print $this->GetTaxonomy(); ?>" class="control-label"><?php echo $this->GetTitle(); ?></label>
            <textarea class="<?php print $this->UseWysiwing() ? 'ckeditor' : ''; ?> form-control" id="text-<?php print $this->GetAttrName(); ?>-<?php print $this->GetTaxonomy(); ?>" name="text-<?php print $this->GetAttrName(); ?>-<?php print $this->GetTaxonomy(); ?>" rows="10" cols="10"><?php print $page->GetMeta($this->GetAttrName()); ?></textarea>
            <?php parent::FormEdit($page); ?>
        </div>
        <?php
    }
    
    public function GetFormEdit($args=array())
    {
        return isset($args[$this->GetAttrName()]) ? $args[$this->GetAttrName()] : get_request_p('text-'.$this->GetAttrName().'-'.$this->GetTaxonomy(), '', true);
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
