<?php

namespace App\Filament\Resources\Experiences\Pages;

use App\Filament\Resources\Experiences\ExperienceResource;
use Filament\Resources\Pages\CreateRecord;
use App\Traits\FilamentNotificationTrait;
use Illuminate\Support\Facades\Auth;
use App\Enums\AppNotificationEnum;

class CreateExperience extends CreateRecord
{
    use FilamentNotificationTrait;
    
    protected static string $resource = ExperienceResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['about_me_id'] = Auth::user()->id;
        $data['end_date'] = $data['till_present'] === true ? null : $data['end_date'];

        return $data;
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return $this->notify("Record successfully Added", AppNotificationEnum::SUCCESS);
    }
}
