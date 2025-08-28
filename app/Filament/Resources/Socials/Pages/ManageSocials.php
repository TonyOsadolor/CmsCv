<?php

namespace App\Filament\Resources\Socials\Pages;

use App\Filament\Resources\Socials\SocialResource;
use Filament\Resources\Pages\ManageRecords;
use Illuminate\Support\Facades\Auth;
use Filament\Actions\CreateAction;

class ManageSocials extends ManageRecords
{
    protected static string $resource = SocialResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->mutateDataUsing(function (array $data): array {
                    $data['about_me_id'] = Auth::user()->id;
                    
                    return $data;
                }),
        ];
    }
}
