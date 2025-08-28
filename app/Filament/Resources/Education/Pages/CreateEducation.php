<?php

namespace App\Filament\Resources\Education\Pages;

use App\Filament\Resources\Education\EducationResource;
use App\Traits\FilamentNotificationTrait;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;
use App\Enums\AppNotificationEnum;

class CreateEducation extends CreateRecord
{
    use FilamentNotificationTrait;

    protected static string $resource = EducationResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['about_me_id'] = Auth::user()->id;

        return $data;
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return $this->notify("Record successfully Added", AppNotificationEnum::SUCCESS);
    }
}
