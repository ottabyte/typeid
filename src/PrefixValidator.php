<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\TypeId;

final class PrefixValidator
{
    public static function validate(string $prefix): bool
    {
        if ($prefix === '') {
            return true;
        }

        if (\mb_strlen($prefix) > 63) {
            throw PrefixException::lengthMismatch($prefix);
        }

        if (!\preg_match('/^[a-z_]{0,63}$/', $prefix)) {
            throw PrefixException::invalid($prefix);
        }

        return true;
    }
}
