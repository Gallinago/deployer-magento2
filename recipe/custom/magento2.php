<?php
declare(strict_types=1);

/**
 * File: magento2.php
 * @copyright Gallinago <https://gallinago.pl>
 */

namespace Deployer;

desc('Local deploy static assets');
task('magento:local:setup:static-content:deploy', function () {
    $locales = get('locales') ?: [];
    runLocally(sprintf(
        '{{local_bin/php}} {{local_src}}/bin/magento setup:static-content:deploy -f %s',
        implode(' ', $locales)
    ));
});

desc('Local DI compile');
task('magento:local:setup:di:compile', function () {
    runLocally('{{local_bin/php}} {{local_src}}/bin/magento setup:di:compile');
});

desc('Setup upgrade');
task('magento:setup:upgrade', function () {
    run('{{bin/php}} {{release_path}}/bin/magento setup:upgrade');
});

desc('Setup upgrade keep generated');
task('magento:setup:upgrade:keep-generated', function () {
    run('{{bin/php}} {{release_path}}/bin/magento setup:upgrade --keep-generated');
});

desc('Setup backup db');
task('magento:setup:backup:db', function () {
    run('{{bin/php}} {{release_path}}/bin/magento setup:backup --db');
});

desc('Flush cache');
task('magento:cache:flush', function () {
    run('{{bin/php}} {{release_path}}/bin/magento cache:flush');
});

desc('Enable maintenance mode');
task('magento:maintenance:enable', function () {
    run('{{bin/php}} {{release_path}}/bin/magento maintenance:enable');
});

desc('Disable maintenance mode');
task('magento:maintenance:disable', function () {
    run('{{bin/php}} {{release_path}}/bin/magento maintenance:disable');
});
