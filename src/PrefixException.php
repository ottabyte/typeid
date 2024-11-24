<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\TypeId;

final class PrefixException extends AbstractTypeIdException
{
    public static function invalid(string $prefix): self
    {
        throw new self("Invalid prefix: {$prefix}. Prefix should match [a-z]+");
    }

    public static function lengthMismatch(string $prefix): self
    {
        throw new self("Invalid prefix: {$prefix}. Prefix length is ".\mb_strlen($prefix).', expected <= 63');
    }
}
