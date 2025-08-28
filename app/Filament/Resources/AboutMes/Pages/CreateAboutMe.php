<?php

namespace App\Filament\Resources\AboutMes\Pages;

use App\Filament\Resources\AboutMes\AboutMeResource;
use Filament\Resources\Pages\CreateRecord;
use App\Traits\FilamentNotificationTrait;
use Illuminate\Support\Facades\Auth;
use App\Enums\AppNotificationEnum;

class CreateAboutMe extends CreateRecord
{
    use FilamentNotificationTrait;

    protected static string $resource = AboutMeResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = Auth::user()->id;

        $data['photo'] = $data['image'];

        return $data;
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return $this->notify("Record successfully Added", AppNotificationEnum::SUCCESS);
    }

}
