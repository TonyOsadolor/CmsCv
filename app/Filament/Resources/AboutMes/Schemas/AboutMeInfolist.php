<?php

namespace App\Filament\Resources\AboutMes\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Schemas\Schema;
use App\Models\AboutMe;

class AboutMeInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                ImageEntry::make('photo')
                    ->defaultImageUrl(function (AboutMe $aboutMe) {
                        return '/public/'.$aboutMe->photo;
                    })
                    ->square()
                    ->imageHeight(200)
                    ->columnSpanFull(),
                TextEntry::make('surname'),
                TextEntry::make('first_name'),
                TextEntry::make('middle_name'),
                TextEntry::make('phone'),
                TextEntry::make('email'),
                TextEntry::make('experience'),
                TextEntry::make('freelance'),
                TextEntry::make('degree'),
                TextEntry::make('core_skills'),
                TextEntry::make('address'),
                TextEntry::make('state'),
                TextEntry::make('country'),
                IconEntry::make('is_active')
                    ->boolean(),
                TextEntry::make('quote')
                    ->columnSpanFull(),
            ]);
    }
}
