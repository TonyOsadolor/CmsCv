<?php

namespace App\Filament\Resources\AboutMes\Pages;

use App\Filament\Resources\AboutMes\AboutMeResource;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Model;
use Filament\Actions\CreateAction;
use App\Models\AboutMe;

class ListAboutMes extends ListRecords
{
    protected static string $resource = AboutMeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->visible(fn () => AboutMe::count() < 1),
        ];
    }
}
