<?php

namespace Deployer;

require 'vendor/deployer/deployer/recipe/magento2.php';

set('release_name', function () {
    return date('YmdHis');
});

set('magento_dir', '.');
set('repository', 'git@github.com:Shubhendra-hbwsl/MagentoPro.git');
set('languages', 'en_US');
set('keep_releases', 3);
set('default_timeout', 900);
inventory("hosts.yml");
