<?php

namespace App\Filament\Admin\Resources\Munio\Membership\MemberResource\Pages;

use App\Filament\Admin\Resources\Munio\Membership\MemberResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMembers extends ListRecords
{
    protected static string $resource = MemberResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
