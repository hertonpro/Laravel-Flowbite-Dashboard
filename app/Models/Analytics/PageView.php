<?php

namespace App\Models\Analytics;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class PageView extends Model
{
    protected $fillable = [
        'url',
        'ip_address',
        'user_agent',
        'referer',
        'user_id',
        'visited_at',
        'duration'
    ];

    protected $casts = [
        'visited_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeToday($query)
    {
        return $query->whereDate('visited_at', today());
    }

    public function scopeThisWeek($query)
    {
        return $query->whereBetween('visited_at', [now()->startOfWeek(), now()->endOfWeek()]);
    }

    public function scopeThisMonth($query)
    {
        return $query->whereMonth('visited_at', now()->month)
                    ->whereYear('visited_at', now()->year);
    }
}
