<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\TypeId;

final class SuffixException extends AbstractTypeIdException
{
    public static function invalid(string $message): self
    {
        throw new self('Invalid suffix: '.$message);
    }

    public static function empty(): self
    {
        throw new self('Invalid suffix: Suffix cannot be empty');
    }

    public static function invalidFirstCharacter(string $suffix): self
    {
        throw new self(\sprintf('Invalid suffix: %s: First character must be in the range [0-7]', $suffix));
    }
}
