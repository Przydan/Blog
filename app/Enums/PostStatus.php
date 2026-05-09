<?php

namespace App\Enums;

enum PostStatus: string
{
    case Draft = 'draft';
    case Published = 'published';
    case Deleted = 'deleted';

    public function label(): string
    {
        return match ($this) {
            self::Draft => 'Draft',
            self::Published => 'Published',
            self::Deleted => 'Deleted',
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::Draft => 'bg-yellow-100 text-yellow-800 border-yellow-200',
            self::Published => 'bg-green-100 text-green-800 border-green-200',
            self::Deleted => 'bg-red-100 text-red-800 border-red-200',
        };
    }
}
