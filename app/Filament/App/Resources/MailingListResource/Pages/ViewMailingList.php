<?php

namespace App\Filament\App\Resources\MailingListResource\Pages;

use App\Filament\App\Resources\MailingListResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewMailingList extends ViewRecord
{
    protected static string $resource = MailingListResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
