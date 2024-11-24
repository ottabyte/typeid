<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\TypeId;

final class TypeIdException extends AbstractTypeIdException
{
    public static function empty(string $id): self
    {
        throw new self("Invalid TypeID. Prefix cannot be empty when there's a separator: {$id}");
    }
}
