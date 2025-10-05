<?php

declare(strict_types=1);

namespace Mortezaa97\Sliders\Filament\Resources\Slides\Pages;

use Filament\Resources\Pages\CreateRecord;
use Mortezaa97\Sliders\Filament\Resources\Slides\SlideResource;

class CreateSlide extends CreateRecord
{
    protected static string $resource = SlideResource::class;
}
