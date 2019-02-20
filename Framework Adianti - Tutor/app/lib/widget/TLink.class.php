<?php
class TLink extends TElement
{
    public function __construct($label)
    {
        parent::__construct('a');
        $this->id = 'tlink_' . uniqid();
        $this->class = 'tlink';
        
        $style = new TStyle('tlink');
        $style->display = 'inline-block';
        $style->border = '1px solid #000';
        $style->padding = '4px';
        $style->border_radius  = '5px 5px 5px 5px';
        $style->background = '#FFFFD8';
        $style->cursor = 'pointer';
        $style->show();
        
        parent::add($label);
    }
    
    public function setReference($ref)
    {
        $this->href = $ref;
    }
}
?>