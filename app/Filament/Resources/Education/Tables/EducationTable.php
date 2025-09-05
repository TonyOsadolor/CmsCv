<?php

namespace App\Filament\Resources\Education\Tables;

use Filament\Actions\ForceDeleteBulkAction;
use Filament\Tables\Filters\TrashedFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Notifications\Notification;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\ViewAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use App\Models\Education;

class EducationTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('type')
                    ->label('Type')
                    ->searchable(),
                TextColumn::make('degree_type')
                    ->label('Degree Type')
                    ->limit(20)
                    ->searchable(),
                TextColumn::make('institute')
                    ->label('Institution')
                    ->searchable(),
                TextColumn::make('course')
                    ->searchable(),
                TextColumn::make('institute_town')
                    ->searchable(),
                SelectColumn::make('sort_order')
                    ->native(false)
                    ->options(function () {
                        $existingOrders = Education::whereNotNull('sort_order')
                            ->orderBy('sort_order')->pluck('sort_order', 'sort_order')->toArray();
                            
                            $maxSortOrder = Education::max('sort_order');
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
                                ->body("Cannot remove sort for {$record->degree_type}")->send();
                            return;
                        }
                    })
                    ->afterStateUpdated(function ($record) {
                        Notification::make()->success()
                            ->title('Sort Updated')
                            ->body("{$record->degree_type} Sorted Successfully")->send();
                    }),
                TextColumn::make('start_date')
                    ->date(),
                TextColumn::make('end_date')
                    ->date(),
                IconColumn::make('till_present')
                    ->boolean(),
                TextColumn::make('equivalent')
                    ->limit(20),
                ToggleColumn::make('is_active')
                    ->afterStateUpdated(function ($record) {
                        $status = $record->is_active === true ? 'Activated' : 'Deactivated';
                        $msg = $record->degree_type ." {$status} successfully!";
                        Notification::make()->title($status.' successfully')
                            ->body($msg)
                            ->success()->send();
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
}
