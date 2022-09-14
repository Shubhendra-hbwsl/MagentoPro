<?php

namespace Unit1\Test\Controller\My;

use Magento\Framework\App\Action\HttpGetActionInterface;

class Mydex implements HttpGetActionInterface{
    public function execute()
    {
        echo "Hello world!\n";
        exit();
    }
}
