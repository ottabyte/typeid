<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\TypeId;

final class SuffixValidator
{
    public static function validate(string $suffix): bool
    {
        if (\preg_match('/[A-Z]/', $suffix)) {
            throw SuffixException::invalid($suffix);
        }

        try {
            Base32::decode($suffix);

            $firstCharacter = (int) \mb_substr($suffix[0], 0, 1);

            if ($firstCharacter < 0 || $firstCharacter > 7) {
                throw SuffixException::invalidFirstCharacter($suffix);
            }

            return true;
        } catch (\Exception) {
            throw SuffixException::invalid($suffix);
        }
    }
}
