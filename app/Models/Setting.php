<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Setting extends Model
{
    protected $fillable = ['key', 'value'];

    protected static ?Collection $cache = null;

    public static function get(string $key, mixed $default = null): mixed
    {
        if (self::$cache === null) {
            self::$cache = self::all()->pluck('value', 'key');
        }

        return self::$cache->get($key, $default);
    }

    public static function clearCache(): void
    {
        self::$cache = null;
    }
}
