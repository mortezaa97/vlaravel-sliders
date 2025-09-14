<?php

declare(strict_types=1);

namespace Mortezaa97\Sliders\Filament\Resources\Sliders\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Mortezaa97\Sliders\Filament\Resources\Sliders\SliderResource;

class ListSliders extends ListRecords
{
    protected static string $resource = SliderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
