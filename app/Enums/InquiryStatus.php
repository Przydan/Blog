<?php

namespace App\Enums;

enum InquiryStatus: string
{
    case Pending = 'pending';
    case InProgress = 'in_progress';
    case Completed = 'completed';
    case Cancelled = 'cancelled';

    public function label(): string
    {
        return match ($this) {
            self::Pending => 'Pending',
            self::InProgress => 'In Progress',
            self::Completed => 'Completed',
            self::Cancelled => 'Cancelled',
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::Pending => 'bg-yellow-100 text-yellow-800 border-yellow-200',
            self::InProgress => 'bg-blue-100 text-blue-800 border-blue-200',
            self::Completed => 'bg-green-100 text-green-800 border-green-200',
            self::Cancelled => 'bg-red-100 text-red-800 border-red-200',
        };
    }
}
