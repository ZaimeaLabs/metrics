<?php

declare(strict_types=1);

namespace Zaimea\Metrics;

use Illuminate\Database\Eloquent\Model;

class Metric extends Model
{
    protected $table = 'metrics';

    protected $fillable = [
        'model',
        'name',
        'year',
        'month',
        'day',
        'value',
    ];
}
