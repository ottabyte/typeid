<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit;

use BaseCodeOy\TypeId\AbstractTypeIdException;
use BaseCodeOy\TypeId\Decoder;

it('decodes with a prefix and uuid', function (string $name, string $typeid, string $prefix, string $uuid): void {
    $decoder = new Decoder();
    $decoded = $decoder->decode($typeid);

    expect($decoded->getType())->toBe($prefix);
    expect($decoded->getUuid())->toBe($uuid);
})->with('valid');

it('fails to decode invalid values', function (string $name, string $typeid, string $description): void {
    expect(fn () => (new Decoder())->decode($typeid))->toThrow(AbstractTypeIdException::class);
})->with('invalid');
