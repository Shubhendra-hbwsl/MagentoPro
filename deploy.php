<?php

namespace Deployer;

require 'vendor/deployer/deployer/recipe/magento2.php';

set('release_name', function () {
    return date('YmdHis');
});

set('magento_dir', '.');
set('repository', 'git@github.com:Shubhendra-hbwsl/MagentoPro.git');
set('languages', 'en_US');
set('default_timeout', 900);

set('shared_files', [
    'app/etc/env.php',
    'pub/sitemap.xml',
    'var/.maintenance.ip',
]);

inventory("hosts.yml");
