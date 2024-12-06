<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

use Symfony\Component\Yaml\Yaml;

dataset('valid', Yaml::parseFile(__DIR__.'/../../spec/valid.yml'));

dataset('invalid', Yaml::parseFile(__DIR__.'/../../spec/invalid.yml'));
