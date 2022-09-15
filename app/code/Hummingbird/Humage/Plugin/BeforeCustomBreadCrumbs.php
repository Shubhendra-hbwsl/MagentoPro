<?php

namespace Hummingbird\Humage\Plugin;

use \Magento\Theme\Block\Html\Breadcrumbs;

class BeforeCustomBreadCrumbs{
    public function beforeAddCrumb(Breadcrumbs $subject, $crumbName, $crumbInfo){
        $crumbInfo['label'] = "Hummingbird " . $crumbInfo['label'];
        return [$crumbName, $crumbInfo];
    }
}