<?php

declare(strict_types=1);

namespace Mortezaa97\Sliders\Filament\Resources\Sliders;

use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Mortezaa97\Sliders\Filament\Resources\Sliders\Pages\CreateSlider;
use Mortezaa97\Sliders\Filament\Resources\Sliders\Pages\EditSlider;
use Mortezaa97\Sliders\Filament\Resources\Sliders\Pages\ListSliders;
use Mortezaa97\Sliders\Filament\Resources\Sliders\Schemas\SliderForm;
use Mortezaa97\Sliders\Filament\Resources\Sliders\Tables\SlidersTable;
use Mortezaa97\Sliders\Models\Slider;

class SliderResource extends Resource
{
    protected static ?string $model = Slider::class;

    protected static ?string $navigationLabel = 'اسلایدر ها';

    protected static ?string $modelLabel = 'اسلایدر';

    protected static ?string $pluralModelLabel = 'اسلایدر ها';

    protected static string|null|\UnitEnum $navigationGroup = 'اسلایدرها';
    protected static ?string $recordTitleAttribute = 'اسلایدر';

    public static function form(Schema $schema): Schema
    {
        return SliderForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SlidersTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListSliders::route('/'),
            'create' => CreateSlider::route('/create'),
            'edit' => EditSlider::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
