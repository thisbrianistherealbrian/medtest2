<?php

namespace App\Filament\App\Resources\MailingListResource\Pages;

use App\Filament\App\Resources\MailingListResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMailingLists extends ListRecords
{
    protected static string $resource = MailingListResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
