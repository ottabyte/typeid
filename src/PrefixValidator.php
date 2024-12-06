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
        // if ($prefix === '') {
        //     return true;
        // }

        if (\mb_strlen($prefix) > 63) {
            throw PrefixException::lengthMismatch($prefix);
        }

        $length = \mb_strlen($prefix);

        for ($i = 0; $i < $length; ++$i) {
            $code = \ord($prefix[$i]);
            $isLowerAtoZ = $code > 96 && $code < 123;
            $isUnderscore = $code === 95;

            // first and last char of prefix can only be [a-z]
            if (($i === 0 || $i === $length - 1) && !$isLowerAtoZ) {
                throw PrefixException::invalid($prefix);
            }

            if (!$isLowerAtoZ && !$isUnderscore) {
                throw PrefixException::invalid($prefix);
            }
        }

        return true;
    }
}
