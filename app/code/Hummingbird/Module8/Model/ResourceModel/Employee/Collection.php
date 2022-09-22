<?php 

namespace Hummingbird\Module8\Model\ResourceModel\Employee;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Hummingbird\Module8\Model\Employee as EmployeeModel;
use Hummingbird\Module8\Model\ResourceModel\Employee as EmployeeResourceModel;

class Collection extends AbstractCollection{
    public function _construct(){
        $this->_init('Hummingbird\Module8\Model\Employee', 'Hummingbird\Module8\Model\ResourceModel\Employee');
    }
}