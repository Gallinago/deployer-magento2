<?php
declare(strict_types=1);

/**
 * File: config.php
 * @copyright Gallinago <https://gallinago.pl>
 */

namespace Deployer;

set('composer_options', '-o --no-dev --prefer-dist');

set('symlinks', []);

set('shared_files', [
   'app/etc/env.php'
]);

set('shared_dirs', [
    'var/log',
    'var/report',
    'var/backups',
    'pub/media',
    'pub/sitemap',
]);

set('writable_mode', 'chmod');
set('writable_dirs', [
    'var',
    'pub/static',
]);

set('build_exclusions', [
    './.DS_Store',
    './.git',
    './.gitignore',
    './.docker',
    './.dockerignore',
    './.circleci',
    './.user.ini',
    './.travis.yml',
    './.php_cs',
    './.htaccess*',
    './.phpstorm.meta.php',
    './*.sample',
    './*.md',
    './auth.json',
    './dev',
    './phpserver',
    './LICENSE*.txt',
    './COPYING.txt',
    './deploy*.php',
    './docker-compose.*',
    './docker-sync.*',
    './env.sample.php',
    './phpunit.xml',
    './phpcs.xml',
    './.php_cs.dist',
    './tsconfig.json',
    './tslint.json',
    './crossbow.yaml',
    './fe',
    './node_modules',
    './app/design/frontend/*/*/node_modules',
    'composer-cache',
    'npm-cache'
]);

set('local_bin/php', function () {
    return runLocally('which php');
});
