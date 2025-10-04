<?php

declare(strict_types=1);

namespace Mortezaa97\Sliders\Filament\Resources\Slides\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Mortezaa97\Sliders\Filament\Resources\Slides\SlideResource;

class ListSlides extends ListRecords
{
    protected static string $resource = SlideResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
