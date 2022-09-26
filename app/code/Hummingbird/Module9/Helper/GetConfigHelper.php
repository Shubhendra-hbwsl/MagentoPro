<?php

namespace Hummingbird\Module9\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;

class GetConfigHelper extends AbstractHelper{
    protected $scope;
    private const IS_ENABLED = "mod9_tab/general/enable";
    private const DISPLAY_TEXT = "mod9_tab/general/text";

    public function __construct(
        Context $context,
        ScopeConfigInterface $scope
    ){
        $this->scope = $scope;
        parent::__construct($context);
    }

    public function isEnabled(){
        return $this->scope->getValue(self::IS_ENABLED, ScopeInterface::SCOPE_STORE);
    }

    public function getAdminDisplayText(){
        return $this->scope->getValue(self::DISPLAY_TEXT, ScopeInterface::SCOPE_STORE);
    }

}