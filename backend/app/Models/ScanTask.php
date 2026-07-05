<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ScanTask extends Model
{
    protected $fillable = [
        'user_id',
        'target_url',
        'status',
        'vulnerabilities_summary',
        'full_report',
        'started_at',
        'completed_at',
    ];

    protected function casts(): array
    {
        return [
            'vulnerabilities_summary' => 'array',
            'full_report' => 'array',
            'started_at' => 'datetime',
            'completed_at' => 'datetime',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
