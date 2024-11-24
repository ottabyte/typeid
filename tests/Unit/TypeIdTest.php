<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit;

use BaseCodeOy\TypeId\TypeId;
use BaseCodeOy\TypeId\Uuid;

it('creates a TypeId instance', function (string $name, string $typeid, string $prefix, string $uuid): void {
    $encoded = TypeId::fromUuid($prefix, $uuid);

    expect($encoded->getPrefix())->toBe($prefix);
    expect($encoded->getSuffix())->toBe(Uuid::fromString($uuid)->toBase32());
})->with('valid');
