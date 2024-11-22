<?php

namespace App\Filament\App\Resources\VisitorsResource\Pages;

use App\Filament\App\Resources\VisitorsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVisitors extends EditRecord
{
    protected static string $resource = VisitorsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
