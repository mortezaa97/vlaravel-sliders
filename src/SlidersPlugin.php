<?php

declare(strict_types=1);

namespace Mortezaa97\Sliders;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Mortezaa97\Sliders\Filament\Resources\Sliders\SliderResource;
use Mortezaa97\Sliders\Filament\Resources\Slides\SlideResource;

class SlidersPlugin implements Plugin
{
    public static function make(): static
    {
        return app(static::class);
    }

    public function getId(): string
    {
        return 'sliders';
    }

    public function register(Panel $panel): void
    {
        $panel
            ->resources([
                'SliderResource' => SliderResource::class,
                'SlideResource' => SlideResource::class,
            ]);
    }

    public function boot(Panel $panel): void
    {
        //
    }
}
