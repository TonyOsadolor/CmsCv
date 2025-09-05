<?php

namespace App\Filament\Resources\Experiences\Tables;

use Filament\Actions\ForceDeleteBulkAction;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\ViewAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use App\Models\Experience;

class ExperiencesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('role')
                    ->searchable(),
                TextColumn::make('company')
                    ->searchable()
                    ->limit(20),
                TextColumn::make('job_description')
                    ->searchable()
                    ->limit(20),
                TextColumn::make('location')
                    ->searchable(),
                SelectColumn::make('sort_order')
                    ->native(false)
                    ->options(function () {
                        $existingOrders = Experience::whereNotNull('sort_order')
                            ->orderBy('sort_order')->pluck('sort_order', 'sort_order')->toArray();
                            
                            $maxSortOrder = Experience::max('sort_order');
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
                                ->body("Cannot remove sort for {$record->role}")->send();
                            return;
                        }
                    })
                    ->afterStateUpdated(function ($record) {
                        Notification::make()->success()
                            ->title('Sort Updated')
                            ->body("{$record->role} Sorted Successfully")->send();
                    }),
                TextColumn::make('start_date')
                    ->date(),
                TextColumn::make('end_date')
                    ->date(),
                IconColumn::make('till_present')
                    ->boolean(),
                ToggleColumn::make('is_active')
                    ->afterStateUpdated(function ($record) {
                        $status = $record->is_active === true ? 'Activated' : 'Deactivated';
                        $msg = $record->role ." {$status} successfully!";
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
