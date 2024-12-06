<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withCache(__DIR__.'/.build/rector/')
    // ->import(__DIR__.'/vendor/fakerphp/faker/rector-migrate.php')
    ->withPaths([
        __DIR__.'/src/',
        __DIR__.'/tests/',
        __DIR__.'/.php-cs-fixer.php',
        __DIR__.'/rector.php',
    ])
    ->withPhpSets(php83: true)
    ->withPreparedSets(
        deadCode: true,
        codeQuality: true,
        codingStyle: true,
        typeDeclarations: true,
        privatization: true,
        naming: true,
        instanceOf: true,
        earlyReturn: true,
        strictBooleans: true,
        carbon: true,
        rectorPreset: true,
        phpunitCodeQuality: true,
        doctrineCodeQuality: true,
        symfonyCodeQuality: true,
        symfonyConfigs: true,
        twig: true,
        phpunit: true,
    )
    ->withRootFiles();
