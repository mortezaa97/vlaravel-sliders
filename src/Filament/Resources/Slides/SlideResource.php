<?php

declare(strict_types=1);

namespace Mortezaa97\Sliders\Filament\Resources\Slides;

use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Mortezaa97\Sliders\Filament\Resources\Slides\Pages\CreateSlide;
use Mortezaa97\Sliders\Filament\Resources\Slides\Pages\EditSlide;
use Mortezaa97\Sliders\Filament\Resources\Slides\Pages\ListSlides;
use Mortezaa97\Sliders\Filament\Resources\Slides\Schemas\SlideForm;
use Mortezaa97\Sliders\Filament\Resources\Slides\Tables\SlidesTable;
use Mortezaa97\Sliders\Models\Slide;
use UnitEnum;

class SlideResource extends Resource
{
    protected static ?string $model = Slide::class;

    protected static ?string $navigationLabel = 'اسلاید ها';

    protected static ?string $modelLabel = 'اسلاید';

    protected static ?string $pluralModelLabel = 'اسلاید ها';

    protected static string|null|UnitEnum $navigationGroup = 'اسلایدرها';

    protected static ?string $recordTitleAttribute = 'اسلاید';

    public static function form(Schema $schema): Schema
    {
        return SlideForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SlidesTable::configure($table);
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
            'index' => ListSlides::route('/'),
            'create' => CreateSlide::route('/create'),
            'edit' => EditSlide::route('/{record}/edit'),
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
