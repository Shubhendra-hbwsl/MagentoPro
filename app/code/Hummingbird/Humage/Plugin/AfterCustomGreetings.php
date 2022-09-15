<?php

namespace Hummingbird\Humage\Plugin;

use Magento\Theme\Block\Html\Header;
use Magento\Theme\Block\Html\Footer;

class AfterCustomGreetings{
    public function afterGetWelcome(Header $subject, $result){
        return "Hello World! From the Plugin";
    }

    public function afterGetCopyright(Footer $subject, $result){
        return "Custom Copyright 2022, From the Plugin";
    }
}