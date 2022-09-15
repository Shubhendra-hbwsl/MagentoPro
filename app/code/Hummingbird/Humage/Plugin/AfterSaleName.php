<?php

namespace Hummingbird\Humage\Plugin;

use Magento\Catalog\Model\Product;

class AfterSaleName{
    public function afterGetName(Product $subject, $result){
        if($subject->getPrice()<60){
            $result = 'On Sale! ' . $result;
        }

        return $result;
    }
}