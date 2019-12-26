<?php
declare(strict_types=1);

/**
 * File: symlinks.php
 * @copyright Gallinago <https://gallinago.pl>
 */

namespace Deployer;

desc('Create symlinks defined by configuration');
task('symlinks:local:create', function () {
    /** @var array $symlinks */
    $symlinks = get('symlinks');

    foreach ($symlinks as $src => $dest) {
        runLocally(sprintf('ln -sf %s %s', $src, $dest));
    }
});
