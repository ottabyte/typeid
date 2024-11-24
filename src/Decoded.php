<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\TypeId;

final class Decoded
{
    public function __construct(
        private string $type,
        private string $uuid,
    ) {}

    public function getType(): string
    {
        return $this->type;
    }

    public function getUuid(): string
    {
        return $this->uuid;
    }
}
