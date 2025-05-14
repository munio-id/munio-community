<?php

namespace App\Filament\Admin\Resources\Munio\Membership\MemberResource\Pages;

use App\Filament\Admin\Resources\Munio\Membership\MemberResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMember extends EditRecord
{
    protected static string $resource = MemberResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
