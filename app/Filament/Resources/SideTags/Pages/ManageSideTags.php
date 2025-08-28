<?php

namespace App\Filament\Resources\SideTags\Pages;

use App\Filament\Resources\SideTags\SideTagResource;
use Filament\Resources\Pages\ManageRecords;
use Illuminate\Support\Facades\Auth;
use Filament\Actions\CreateAction;

class ManageSideTags extends ManageRecords
{
    protected static string $resource = SideTagResource::class;

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
