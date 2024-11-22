<?php

namespace App\Filament\App\Resources\MailingListResource\Pages;

use App\Filament\App\Resources\MailingListResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMailingList extends EditRecord
{
    protected static string $resource = MailingListResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
