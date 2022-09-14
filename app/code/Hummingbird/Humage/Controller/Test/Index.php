<?php

namespace Hummingbird\Humage\Controller\Test;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Hummingbird\Humage\MagentoU\Test;

class Index implements HttpGetActionInterface{

    protected $testobj;
    public function __construct(Test $testobj){
        // Injected Test class. this is class Test already has an CategoryInterface injected into it with pref MyCategory.
        $this->testobj = $testobj;
    }

    public function execute()
    {
        $this->testobj->displayParams();
        exit();
    }
}