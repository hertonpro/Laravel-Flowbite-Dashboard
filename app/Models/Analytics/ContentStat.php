<?php

namespace App\Models\Analytics;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ContentStat extends Model
{
    protected $fillable = [
        'model_type',
        'model_id',
        'date',
        'views',
        'unique_views',
        'interactions',
        'metadata'
    ];

    protected $casts = [
        'date' => 'date',
        'metadata' => 'array'
    ];

    public function model()
    {
        return $this->morphTo('model', 'model_type', 'model_id');
    }

    public function scopeForModel($query, $modelType, $modelId)
    {
        return $query->where('model_type', $modelType)
                    ->where('model_id', $modelId);
    }

    public function scopeForDate($query, $date)
    {
        return $query->where('date', $date);
    }

    public static function incrementViews($modelType, $modelId, $date = null, $unique = false)
    {
        $date = $date ?? today();
        $field = $unique ? 'unique_views' : 'views';
        
        return static::updateOrCreate(
            [
                'model_type' => $modelType,
                'model_id' => $modelId,
                'date' => $date
            ],
            [$field => DB::raw($field . ' + 1')]
        );
    }
}
