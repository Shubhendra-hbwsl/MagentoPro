<?php 

namespace Hummingbird\Module6\Block\Product\View;
use Magento\Framework\View\Element\Template;
use Magento\Catalog\Block\Product\View\Description;

class BeforeDescription extends Template{

    public function beforeToHtml(Description $desc)
    {
        $newDescription = "This product is not that bad. Custom desc";
        $desc->getProduct()->setDescription($newDescription);        
    }
    
}