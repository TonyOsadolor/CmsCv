<?php

namespace App\Filament\Resources\Experiences\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ExperienceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('role')
                    ->required(),
                TextInput::make('company')
                    ->required(),
                TextInput::make('location')
                    ->required(),
                DatePicker::make('start_date')
                    ->native(false)
                    ->required(),
                DatePicker::make('end_date')
                    ->native(false),
                Toggle::make('till_present')
                    ->required(),
                Toggle::make('is_active')
                    ->required(),
                Textarea::make('job_description')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
