<?php

namespace App\Filament\Resources\AboutMes\Schemas;

use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class AboutMeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('image')
                    ->required(fn ($operation): bool =>  $operation === 'create')
                    ->image()
                    ->maxSize(512)
                    ->disk('public')
                    ->directory('/assets/img')
                    ->visibility('public')
                    ->moveFiles()
                    ->acceptedFileTypes(['image/jpeg', 'image/jpg', 'image/png'])
                    ->getUploadedFileNameForStorageUsing(
                        fn (TemporaryUploadedFile $file): string => (string) str(str_replace(' ', '_', time().'_'.$file->getClientOriginalName()))
                    )
                    ->columnSpanFull(),
                TextInput::make('surname')
                    ->required(),
                TextInput::make('first_name')
                    ->required(),
                TextInput::make('middle_name')
                    ->default(null),
                TextInput::make('experience')
                    ->numeric()
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                TextInput::make('phone')
                    ->tel()
                    ->required(),
                Toggle::make('freelance'),
                TextInput::make('degree')
                    ->default(null),
                TextInput::make('core_skills')
                    ->default(null),
                TextInput::make('address')
                    ->default(null),
                TextInput::make('state')
                    ->default(null),
                TextInput::make('country')
                    ->default(null),
                Textarea::make('quote')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
