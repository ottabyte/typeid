<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\TypeId;

use Ramsey\Uuid\Uuid;

final readonly class Decoder
{
    public static function decode(string $typeId, ?string $prefix = null): Decoded
    {
        $p = '';
        $s = '';
        $underscoreIndex = \mb_strrpos($typeId, '_');

        if ($underscoreIndex === false) {
            $p = '';
            $s = $typeId;
        } else {
            $p = \mb_substr($typeId, 0, $underscoreIndex);
            $s = \mb_substr($typeId, $underscoreIndex + 1);

            if ($p === '') {
                throw PrefixException::empty($typeId);
            }
        }

        if ($s === '') {
            throw SuffixException::empty();
        }

        if ($prefix !== null && $p !== $prefix) {
            throw PrefixException::mismatch($prefix, $p);
        }

        if (!PrefixValidator::validate($p)) {
            throw PrefixException::invalid($p);
        }

        if (!SuffixValidator::validate($s)) {
            throw SuffixException::invalid($s);
        }

        return new Decoded(
            $p,
            Uuid::fromString(
                \implode(
                    '',
                    \array_map(fn (int $b): string => \mb_str_pad(\dechex($b), 2, '0', \STR_PAD_LEFT), Base32::decode($s)),
                ),
            )->toString(),
        );
    }
}
