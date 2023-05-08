<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'user_id',
    ];

    public function createdAt(): string
    {
        return Carbon::createFromDate($this->created_at)
            ->format('d/m/Y H:i');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
