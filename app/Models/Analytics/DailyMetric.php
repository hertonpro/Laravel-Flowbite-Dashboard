<?php

namespace App\Models\Analytics;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DailyMetric extends Model
{
    protected $fillable = [
        'date',
        'metric_name',
        'metric_value',
        'metadata'
    ];

    protected $casts = [
        'date' => 'date',
        'metadata' => 'array',
        'metric_value' => 'integer'
    ];

    public function scopeForMetric($query, $metricName)
    {
        return $query->where('metric_name', $metricName);
    }

    public function scopeForPeriod($query, $startDate, $endDate)
    {
        return $query->whereBetween('date', [$startDate, $endDate]);
    }

    public static function incrementMetric($metricName, $date = null, $value = 1, $metadata = null)
    {
        $date = $date ?? today();
        
        return static::updateOrCreate(
            ['date' => $date, 'metric_name' => $metricName],
            ['metric_value' => DB::raw('metric_value + ' . $value), 'metadata' => $metadata]
        );
    }
}
