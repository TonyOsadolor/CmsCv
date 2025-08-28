<?php

namespace App\Filament\Resources\AboutMes\Pages;

use App\Filament\Resources\AboutMes\AboutMeResource;
use Filament\Resources\Pages\ViewRecord;
use Filament\Actions\EditAction;

class ViewAboutMe extends ViewRecord
{
    protected static string $resource = AboutMeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
