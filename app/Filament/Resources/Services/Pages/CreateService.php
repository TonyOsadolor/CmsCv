<?php

namespace App\Filament\Resources\Services\Pages;

use App\Filament\Resources\Services\ServiceResource;
use Filament\Resources\Pages\CreateRecord;
use App\Traits\FilamentNotificationTrait;
use Illuminate\Support\Facades\Auth;
use App\Enums\AppNotificationEnum;

class CreateService extends CreateRecord
{
    use FilamentNotificationTrait;
    
    protected static string $resource = ServiceResource::class;

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
