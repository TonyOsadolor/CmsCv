<?php

namespace App\Filament\Resources\AboutMes\Pages;

use App\Filament\Resources\AboutMes\AboutMeResource;
use App\Traits\FilamentNotificationTrait;
use Filament\Resources\Pages\EditRecord;
use Filament\Actions\ForceDeleteAction;
use App\Enums\AppNotificationEnum;
use Filament\Actions\DeleteAction;
use Filament\Actions\RestoreAction;

class EditAboutMe extends EditRecord
{
    use FilamentNotificationTrait;

    protected static string $resource = AboutMeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }

    protected function getSavedNotificationTitle(): ?string
    {
        return $this->notify("Record successfully edited", AppNotificationEnum::SUCCESS);
    }
}
