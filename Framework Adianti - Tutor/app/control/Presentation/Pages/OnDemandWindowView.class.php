<?php
class OnDemandWindowView extends TPage
{
    public function __construct()
    {
        parent::__construct();
        
        $window = TWindow::create(_t('On demand window'), 0.8, 650);
        
        $iframe = new TElement('iframe');
        $iframe->id = "iframe_external";
        $iframe->src = "http://www.adianti.com.br/framework_files/template-material/";
        $iframe->frameborder = "0";
        $iframe->scrolling = "yes";
        $iframe->width = "100%";
        $iframe->height = "600px";
        
        $window->add($iframe);
        $window->show();
        
    }
}
