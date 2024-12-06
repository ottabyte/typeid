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
    public static function create(string $message): self
    {
        throw new self('Invalid prefix: '.$message);
    }

    public static function invalid(string $prefix): self
    {
        throw new self(\sprintf('Invalid prefix: %s. Prefix should match [a-z_]+', $prefix));
    }

    public static function lengthMismatch(string $prefix): self
    {
        throw new self(\sprintf('Invalid prefix: %s. Prefix length is ', $prefix).\mb_strlen($prefix).', expected <= 63');
    }

    public static function empty(string $typeId): self
    {
        throw new self(\sprintf("Invalid prefix: Prefix cannot be empty when there's a separator: %s", $typeId));
    }

    public static function mismatch(string $expected, string $actual): self
    {
        throw new self(\sprintf('Invalid prefix: Prefix mismatch. Expected %s, got %s', $expected, $actual));
    }
}
