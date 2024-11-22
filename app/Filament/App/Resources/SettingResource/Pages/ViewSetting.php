<?php

namespace App\Filament\App\Resources\SettingResource\Pages;

use App\Filament\App\Resources\SettingResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewSetting extends ViewRecord
{
    protected static string $resource = SettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
