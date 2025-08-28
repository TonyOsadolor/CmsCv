<?php

namespace App\Filament\Resources\Education\Pages;

use App\Filament\Resources\Education\EducationResource;
use App\Traits\FilamentNotificationTrait;
use Filament\Resources\Pages\EditRecord;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\DeleteAction;
use App\Enums\AppNotificationEnum;
use Filament\Actions\RestoreAction;
use Filament\Actions\ViewAction;

class EditEducation extends EditRecord
{
    protected static string $resource = EducationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
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
