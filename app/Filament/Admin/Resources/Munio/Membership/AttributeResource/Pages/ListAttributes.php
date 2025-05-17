<?php

namespace App\Filament\Admin\Resources\Munio\Membership\AttributeResource\Pages;

use App\Filament\Admin\Resources\Munio\Membership\AttributeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAttributes extends ListRecords
{
    protected static string $resource = AttributeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
