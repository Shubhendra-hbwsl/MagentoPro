<?php 

namespace Hummingbird\Module8\Model;
use Hummingbird\Module8\Model\ResourceModel\Employee as EmployeeResourceModel;
use Magento\Framework\Model\AbstractModel;

class Employee extends AbstractModel{

    public function _construct(){
        $this->_init('Hummingbird\Module8\Model\ResourceModel\Employee');
    }

}