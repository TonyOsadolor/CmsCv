<?php

namespace App\Filament\Resources\Testimonials;

use App\Filament\Resources\Testimonials\Pages\ManageTestimonials;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Database\Eloquent\Builder;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\ImageColumn;
use Filament\Actions\ForceDeleteAction;
use Illuminate\Database\Eloquent\Model;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\BulkActionGroup;
use Filament\Support\Icons\Heroicon;
use Filament\Actions\RestoreAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use App\Models\Testimonial;
use Filament\Tables\Table;
use BackedEnum;
use Filament\Schemas\Components\Utilities\Get;

class TestimonialResource extends Resource
{
    protected static ?string $model = Testimonial::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::InformationCircle;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                // 
            ]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                ImageEntry::make('photo')
                    ->defaultImageUrl(function (Get $get) {
                        $test = Testimonial::where('names', $get('names'))->first();
                        return url($test->default_img);
                    })
                    ->columnSpanFull(),
                TextEntry::make('names'),
                TextEntry::make('occupation'),
                TextEntry::make('phone'),
                TextEntry::make('email')
                    ->label('Email address'),
                IconEntry::make('is_refree')
                    ->boolean(),
                IconEntry::make('publish')
                    ->boolean(),
                TextEntry::make('review')
                    ->columnSpanFull(),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('names')
                    ->searchable(),
                TextColumn::make('occupation')
                    ->searchable(),
                TextColumn::make('phone')
                    ->copyable()
                    ->badge()
                    ->copyMessage('Phone Number Copied')
                    ->searchable(),
                TextColumn::make('email')
                    ->badge()
                    ->copyable()
                    ->copyMessage('Email Copied')
                    ->label('Email address')
                    ->searchable(),
                ImageColumn::make('photo')
                    ->defaultImageUrl(function (Model $model) {
                        return url($model->default_img);
                    }),
                IconColumn::make('is_refree')
                    ->boolean(),
                ToggleColumn::make('publish')
                    ->label('Published?')
                    ->afterStateUpdated(function ($record) {
                        $status = $record->publish === true ? 'published' : 'un-published';
                        $msg = $record->names.'\'s' ." review was {$status} successfully!";
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
                // EditAction::make(),
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
            'index' => ManageTestimonials::route('/'),
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
