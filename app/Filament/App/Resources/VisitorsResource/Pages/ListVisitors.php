<?php

namespace App\Filament\App\Resources\VisitorsResource\Pages;

use App\Filament\App\Resources\VisitorsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVisitors extends ListRecords
{
    protected static string $resource = VisitorsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
