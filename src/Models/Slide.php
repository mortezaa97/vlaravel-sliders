<?php

declare(strict_types=1);

namespace Mortezaa97\Sliders\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slide extends Model
{
    use SoftDeletes;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    protected $appends = [];

    protected $with = [];

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope('order', function (Builder $builder): void {
            $builder->orderByDesc('created_at');
        });
    }

    protected function casts(): array
    {
        return [];
    }

    /*
    * Relations
    */
    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function slider(): BelongsTo
    {
        return $this->belongsTo(Slider::class, 'slider_id');
    }
}
