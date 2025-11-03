<?php

declare(strict_types=1);

namespace Zaimea\Metrics;

use Illuminate\Database\Eloquent\Relations\MorphMany;
use Zaimea\Metrics\Metric;

trait HasMetrics
{
    public function metrics(): MorphMany
    {
        return $this->morphMany(Metric::class, 'model');
    }

    public function incrementMetric(
            string $name,
            int $value = 1,
            bool $withDate = true,
            ?int $year = null,
            ?int $month = null,
            ?int $day = null
        ): void
    {
        $this->metrics()->firstOrCreate([
            'name' => $name,
            'year' => $withDate ? $year ?? now()->year : null,
            'month' => $withDate ? $month ?? now()->month : null,
            'day' => $withDate ? $day ?? now()->day : null,
        ], ['value' => 0])->increment('value', $value);
    }

    public function decrementMetric(
            string $name,
            int $value = 1,
            bool $withDate = true,
            ?int $year = null,
            ?int $month = null,
            ?int $day = null
        ): void
    {
        $this->metrics()->where([
            'name' => $name,
            'year' => $withDate ? $year ?? now()->year : null,
            'month' => $withDate ? $month ?? now()->month : null,
            'day' => $withDate ? $day ?? now()->day : null,
        ])->first()?->decrement('value', $value);
    }
}
