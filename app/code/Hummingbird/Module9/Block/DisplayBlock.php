<?php 

namespace Hummingbird\Module9\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Hummingbird\Module9\Helper\GetConfigHelper;

class DisplayBlock extends Template{
    protected $configHelper;

    public function __construct(
        Context $context,
        GetConfigHelper $configHelper
    ){
        $this->configHelper = $configHelper;
        parent::__construct($context);
    }

    public function isEnabled(){
        return $this->configHelper->isEnabled();
    }

    public function getDisplayText(){
        return $this->configHelper->getAdminDisplayText();
    }
}