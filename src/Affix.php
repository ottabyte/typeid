<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\TypeId;

final readonly class Affix
{
    public static function prefix(string $typeId): string
    {
        $underscoreIndex = \mb_strrpos($typeId, '_');

        if ($underscoreIndex === false) {
            return '';
        }

        return \mb_substr($typeId, 0, $underscoreIndex);
    }

    public static function suffix(string $typeId): string
    {
        $underscoreIndex = \mb_strrpos($typeId, '_');

        if ($underscoreIndex === false) {
            return $typeId;
        }

        return \mb_substr($typeId, $underscoreIndex + 1);
    }
}
