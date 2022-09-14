<?php

namespace Hummingbird\Humage\MagentoU;

use Magento\Catalog\Api\Data\CategoryInterface;

class Test{
    protected $category;
    protected $string_param;
    protected $arr;

    // Inject CategoryInterface with MyCategory class.
    // This Test class witll be injected in the controller.
    public function __construct(CategoryInterface $category, $string_param, $arr)
    {
        $this->category =$category;
        $this->string_param = $string_param;
        $this->arr = $arr;
    }

    public function displayParams(){
        echo "Values :\n";
        echo "String Argument " . $this->string_param . "\n";
        echo "Array Values: \n";
        foreach($this->arr as $item){
            echo "$item \n";
        }
    }

}