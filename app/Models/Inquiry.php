<?php

namespace App\Models;

use App\Enums\InquiryStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Inquiry extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'message', 'status', 'service_id'];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'status' => InquiryStatus::class,
        ];
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(InquiryComment::class)->latest();
    }

    public function responses(): HasMany
    {
        return $this->hasMany(InquiryResponse::class)->latest();
    }
}
