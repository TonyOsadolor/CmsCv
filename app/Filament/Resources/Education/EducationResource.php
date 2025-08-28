<?php

namespace App\Filament\Resources\Education;

use App\Filament\Resources\Education\Schemas\EducationInfolist;
use App\Filament\Resources\Education\Schemas\EducationForm;
use App\Filament\Resources\Education\Pages\CreateEducation;
use App\Filament\Resources\Education\Tables\EducationTable;
use App\Filament\Resources\Education\Pages\EditEducation;
use App\Filament\Resources\Education\Pages\ListEducation;
use App\Filament\Resources\Education\Pages\ViewEducation;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Database\Eloquent\Builder;
use Filament\Support\Icons\Heroicon;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use App\Models\Education;
use BackedEnum;

class EducationResource extends Resource
{
    protected static ?string $model = Education::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::BuildingLibrary;

    public static function form(Schema $schema): Schema
    {
        return EducationForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return EducationInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return EducationTable::configure($table);
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
            'index' => ListEducation::route('/'),
            'create' => CreateEducation::route('/create'),
            'view' => ViewEducation::route('/{record}'),
            'edit' => EditEducation::route('/{record}/edit'),
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
