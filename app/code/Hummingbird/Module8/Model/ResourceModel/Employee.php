<?php 

namespace Hummingbird\Module8\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Employee extends AbstractDb{
    private const TABLE_NAME = "employee_table";
    private const PRIMARY_KEY = "emp_id";
    
    // NOTE: VERY IMP: set this to false for any primary key that isn't auto_incrementing. 
    protected $_isPkAutoIncrement = false;
    
    public function _construct(){
        $this->_init(self::TABLE_NAME, self::PRIMARY_KEY);
    }
}