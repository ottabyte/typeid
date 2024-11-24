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
    public static function decode(string $id): Decoded
    {
        if (\str_contains($id, '_')) {
            [$type, $uuid] = \explode('_', $id, 2);

            if ($type === '') {
                throw TypeIdException::empty($id);
            }
        } else {
            $type = '';
            $uuid = $id;
        }

        if (!PrefixValidator::validate($type)) {
            throw PrefixException::invalid($type);
        }

        if (!SuffixValidator::validate($uuid)) {
            throw SuffixException::invalid($uuid);
        }

        return new Decoded(
            $type,
            Uuid::fromString(
                \implode('', \array_map(fn ($b) => \mb_str_pad(\dechex($b), 2, '0', \STR_PAD_LEFT), Base32::decode($uuid))),
            )->toString(),
        );
    }
}
