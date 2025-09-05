<?php

namespace App\Filament\Resources\SideTags;

use App\Filament\Resources\SideTags\Pages\ManageSideTags;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Columns\SelectColumn;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Forms\Components\Toggle;
use Filament\Actions\BulkActionGroup;
use Filament\Support\Icons\Heroicon;
use Filament\Actions\RestoreAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use App\Models\SideTag;
use BackedEnum;

class SideTagResource extends Resource
{
    protected static ?string $model = SideTag::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::Tag;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('description')
                    ->default(null),
                Toggle::make('is_active')
                    ->required(),
            ]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name'),
                TextEntry::make('description'),
                IconEntry::make('is_active')
                    ->boolean(),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
                TextEntry::make('deleted_at')
                    ->dateTime(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('description'),
                ToggleColumn::make('is_active')
                    ->afterStateUpdated(function ($record) {
                        $status = $record->is_active === true ? 'Activated' : 'Deactivated';
                        $msg = $record->name ." {$status} successfully!";
                        Notification::make()->title($status.' successfully')
                            ->body($msg)
                            ->success()->send();
                    }),
                SelectColumn::make('sort_order')
                    ->native(false)
                    ->options(function () {
                        $existingOrders = SideTag::whereNotNull('sort_order')
                            ->orderBy('sort_order')->pluck('sort_order', 'sort_order')->toArray();
                            
                            $maxSortOrder = SideTag::max('sort_order');
                            $nextSortOrder = $maxSortOrder ? $maxSortOrder + 1 : 1;
                            
                            $options = $existingOrders;
                            $options[$nextSortOrder] = $nextSortOrder;

                            return $options;
                    })
                    ->optionsLoadingMessage('Loading Sorting...')
                    ->noOptionsSearchResultsMessage('No sort order found!')
                    ->rules(['required'])
                    ->beforeStateUpdated(function ($record, $state) {
                        if (!$state || $state == null) {
                            Notification::make()->danger()
                                ->title('Error!')
                                ->body("Cannot remove sort for {$record->name}")->send();
                            return;
                        }
                    })
                    ->afterStateUpdated(function ($record) {
                        Notification::make()->success()
                            ->title('Sort Updated')
                            ->body("{$record->name} Sorted Successfully")->send();
                    }),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
                ForceDeleteAction::make(),
                RestoreAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ])
            ->recordUrl(null);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageSideTags::route('/'),
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
