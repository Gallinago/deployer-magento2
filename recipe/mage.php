<?php
declare(strict_types=1);

/**
 * File: config.php
 * @copyright Gallinago <https://gallinago.pl>
 */

namespace Deployer;

require 'recipe/common.php';
require 'recipe/rsync.php';

require __DIR__ . '/config.php';
require __DIR__ . '/custom/deploy.php';
require __DIR__ . '/custom/zip.php';
require __DIR__ . '/custom/magento2.php';
require __DIR__ . '/custom/composer.php';
require __DIR__ . '/custom/ssh.php';
require __DIR__ . '/custom/symlinks.php';

desc('Build Magento 2 production assets');
task('build', [
    'composer:local:install',
    'magento:local:setup:static-content:deploy',
    'magento:local:setup:di:compile',
    'symlinks:local:create'
]);

desc('Bundle Magento 2 into tarball');
task('bundle', [
    'deploy:zip:create'
]);

desc('Deploy release to sonassi server');
task('deploy:server', [
    'deploy:prepare',
    'deploy:lock',
    'deploy:release',
    'deploy:zip:upload',
    'deploy:zip:unzip',
    'deploy:unlock',
    'success'
]);

desc('Upgrade release');
task('release:upgrade', [
    'deploy:lock',
    'deploy:shared',
    'deploy:writable',
    'deploy:clear_paths',
    'deploy:magento:upgrade',
    'deploy:symlink',
    'deploy:unlock',
    'cleanup',
    'success'
]);

desc('Upgrade db backup & release');
task('release:backup', [
    'deploy:lock',
    'deploy:shared',
    'deploy:writable',
    'deploy:clear_paths',
    'deploy:magento:backup',
    'deploy:symlink',
    'deploy:unlock',
    'cleanup',
    'success'
]);

after('deploy:failed', 'deploy:unlock');
