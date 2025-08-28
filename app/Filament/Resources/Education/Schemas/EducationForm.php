<?php

namespace App\Filament\Resources\Education\Schemas;

use Filament\Schemas\Components\Utilities\Get;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class EducationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('type')
                    ->options([
                        'tertiary' => 'Tertiary',
                        'secondary' => 'Secondary',
                        'primary' => 'Primary',
                    ])
                    ->live()
                    ->native(false),
                TextInput::make('degree_type')
                    ->required(),
                TextInput::make('institute')
                    ->required(),
                TextInput::make('course')
                    ->live()
                    ->required(fn (Get $get) => $get('type') == 'tertiary'),
                TextInput::make('institute_town')
                    ->required(),
                DatePicker::make('start_date')
                    ->native(false)
                    ->required(),
                DatePicker::make('end_date')
                    ->native(false),
                Toggle::make('till_present')
                    ->required(),
                TextInput::make('equivalent')
                    ->required(),
                Toggle::make('is_active')
                    ->required(),
            ]);
    }
}
