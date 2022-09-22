<?php 

namespace Hummingbird\Module8\Block;

use Magento\Framework\View\Element\Template\Context;
use Hummingbird\Module8\Model\ResourceModel\Employee\Collection as EmployeeCollection;
use Magento\Framework\View\Element\Template;


class DataViewBlock extends Template{
    protected $collection;

    public function __construct(
        Context $context,
        EmployeeCollection $collection
    ) {
        $this->collection = $collection;
        parent::__construct($context);
    }

    
    public function getCollection(){
        return $this->collection->getData();
    }


}