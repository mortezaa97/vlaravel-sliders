<?php

declare(strict_types=1);

namespace Mortezaa97\Sliders\Models;

use Mortezaa97\Sliders\Models\Slide;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Slider extends Model
{
    use SoftDeletes;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($item): void {
            // Generate a unique code for the slider
            do {
                $item->code = Str::random(5);
            } while (static::where('code', $item->code)->exists());
        });
    }
    /*
    * Attributes
    */

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

    public function slides(): HasMany
    {
        return $this->hasMany(Slide::class, 'slider_id');
    }
}
