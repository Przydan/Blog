<?php

namespace App\Enums;

enum Role: string
{
    case Administrator = 'administrator';
    case Author = 'author';
    case Reader = 'reader';

    public function label(): string
    {
        return match ($this) {
            self::Administrator => 'Administrator',
            self::Author => 'Author',
            self::Reader => 'Reader',
        };
    }
}
