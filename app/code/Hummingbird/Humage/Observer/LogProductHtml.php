<?php 

namespace Hummingbird\Humage\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;
use Psr\Log\LoggerInterface;

class LogProductHtml implements ObserverInterface{
    private $_logger;   

    public function __construct(LoggerInterface $logger){
        $this->_logger = $logger;
    }
    
    
    public function execute(Observer $observer){
        $this->_logger->info("PRODUCT LOG HTML: " . substr($observer->getData('response')->getBody(),0,700));
    }
}