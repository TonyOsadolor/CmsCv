<?php

namespace App\Filament\Resources\AboutMes;

use App\Filament\Resources\AboutMes\Schemas\AboutMeInfolist;
use App\Filament\Resources\AboutMes\Tables\AboutMesTable;
use App\Filament\Resources\AboutMes\Schemas\AboutMeForm;
use App\Filament\Resources\AboutMes\Pages\CreateAboutMe;
use App\Filament\Resources\AboutMes\Pages\ListAboutMes;
use App\Filament\Resources\AboutMes\Pages\ViewAboutMe;
use App\Filament\Resources\AboutMes\Pages\EditAboutMe;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Database\Eloquent\Builder;
use Filament\Support\Icons\Heroicon;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use App\Models\AboutMe;
use BackedEnum;

class AboutMeResource extends Resource
{
    protected static ?string $model = AboutMe::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUserCircle;

    protected static ?string $recordTitleAttribute = 'surname';

    protected static ?string $pluralModelLabel = 'About Me';

    public static function form(Schema $schema): Schema
    {
        return AboutMeForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return AboutMeInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AboutMesTable::configure($table);
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
            'index' => ListAboutMes::route('/'),
            'create' => CreateAboutMe::route('/create'),
            'view' => ViewAboutMe::route('/{record}'),
            'edit' => EditAboutMe::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->orderByDesc('created_at');
    }
}
