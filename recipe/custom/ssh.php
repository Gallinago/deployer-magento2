<?php
declare(strict_types=1);

/**
 * File: ssh.php
 * @copyright Gallinago <https://gallinago.pl>
 */

namespace Deployer;

desc('Pre-connect to SSH');
task('ssh:preconnect', function () {
    run('echo "Connection Established..."');
});
